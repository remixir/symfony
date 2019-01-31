<?php
    namespace App\Controller;

    use App\Entity\Article;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;


    class ArticleController extends AbstractController{

        /**
         * @Route("/articless", name="article")
         * @Method({"GET"})
         */

        public function articless() {

            $articles=$this->getDoctrine()->getRepository(Article::class)->findAll();

            return $this ->render('articles/article.html.twig', array
            ('articles' => $articles));
        }


        /**
         * @Route("/article/new", name="new_article")
         * Method({"GET", "POST"})
         */

        public function new(Request $request){
            $article = new Article();

            $form = $this->createFormBuilder($article)
                ->add('title', TextType::class,
                    array('attr'=>
                        array('class'=>'form-control')))
                ->add('discription',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('fly',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('abilities',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('abilitiesextra',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('magic',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('move',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('saves',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('braverty',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('wounds',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('imgmodel',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))

                ->add('save',SubmitType::class,
                    array('label'=>'Stwórz',
                        'attr'=> array('class'=>'btn btn-primary mt-3 ')
                    ))
                ->getForm();

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $article= $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();

                return $this->redirectToRoute('article_list');

            }

            return $this ->render ('articles/new.html.twig', array(
                'form'=> $form->createView()
            ));

        }


        /**
         * @Route("/articles/edit/{id}", name="edit_article")
         * Method({"GET", "POST"})
         */

        public function edit(Request $request, $id){
            $article = new Article();
            $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

            $form = $this->createFormBuilder($article)
                ->add('title', TextType::class,
                    array('attr'=>
                        array('class'=>'form-control')))
                ->add('discription',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('fly',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('abilities',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('abilitiesextra',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('magic',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('move',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('saves',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('braverty',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('wounds',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))
                ->add('imgmodel',TextareaType::class,
                    array('required' => false, 'attr'=> array('class'=>'form-control')))

                ->add('save',SubmitType::class,
                    array('label'=>'Edytuj',
                        'attr'=> array('class'=>'btn btn-primary mt-3 ')
                    ))
                ->getForm();

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();

                return $this->redirectToRoute('article_list');

            }

            return $this ->render ('articles/edit.html.twig', array(
                'form'=> $form->createView()
            ));

        }










        /**
         * @Route("/articles/{id}", name="article_show")
         */

        public function show($id){
            $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

            return $this->render('articles/show.html.twig', array('article'=>$article));
        }



        /**
         * @Route("/article/delete/{id}")
         * @Method({"DELETE"})
         */
        public function delete(Request $request, $id) {
            $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
            $response = new Response();
            $response->send();
        }











//        /**
//         * @Route("/article/saves")
//         */
//        public function save(){
//            $entityManager = $this->getDoctrine()->getManager();
//            $article = new Article();
//            $article ->setTitle('Nazwa 2');
//            $article->setDiscription('Opis');
//            $article->setFly('Czy model lata');
//            $article->setAbilities('Umiejetności');
//            $article->setAbilitiesextra('Umiejetnosci dodatkowe');
//            $article->setMagic('Magia');
//            $article->setMove('Poruszanie sie');
//            $article->setSaves('Obrona');
//            $article->setBraverty('Odwaga');
//            $article->setWounds('Rany');
//
//
//            $entityManager->persist($article);
//
//            $entityManager->flush();
//
//            return new Response('Zapisz model o nr id '.$article->getId());
//        }
    }

