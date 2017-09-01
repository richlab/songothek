<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Songs;
use AppBundle\Form\SongsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $songsRepository = $this->getDoctrine()->getRepository(Songs::class);

        /**
         * save changes
         */

        if ($request->request->has('id')){

            /** @var UploadedFile $file */

            $file = $request->files->get('mp3');

            $file->move(
                $this->getParameter('mp3_dir'),
                $file->getClientOriginalName()
            );

            $song = $songsRepository->find($request->get('id'));
            $song->setMp3($file->getClientOriginalName());

            $song->setYear($request->get('year'));
            $song->setBand($request->get('band'));
            $song->setRecordingType($request->get('recording-type'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($song);
            $em->flush();

        }


        /**
         * create new form
         */
        $form = $this->createForm(SongsType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $song= $form->getData();

            /** @var UploadedFile $file */
            $file = $song->getMp3();

            $file->move(
                $this->getParameter('mp3_dir'),
                $file->getClientOriginalName()
            );
            $song->setMp3($file->getClientOriginalName());

            $em = $this->getDoctrine()->getManager();
            $em->persist($song);
            $em->flush();
        }


        /**
         * filtered list
         */
        $query = $songsRepository
            ->createQueryBuilder('s')
            ->where('s.mp3 is not NULL');

        if ($request->request->has('recording_type')){

            $query->andWhere('s.recording_type ='. $request->request->get('recording_type'));
        }
        if ($request->request->has('lang')){

            $query->andWhere('s.lang = \''. $request->request->get('lang') .'\'');
        }

        $query->orderBy('s.title');

        $songs = $query
            ->getQuery()
            ->getResult();

        /**
         * missing mp3s
         */
        $songsWithoutMp3 = $songsRepository
            ->createQueryBuilder('s')
            ->where('s.mp3 is NULL')
            ->orderBy('s.title')
            ->getQuery()
            ->getResult();

        /**
         * render
         */
        return $this->render('default/index.html.twig', [
            'songs' => $songs,
            'songsWithoutMp3' => $songsWithoutMp3,
            'form' => $form->createView()
        ]);
    }
}
