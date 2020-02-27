<?php
# create-question.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use Tuto\Entity\Chapter;
use Tuto\Entity\Collection;
use Tuto\Entity\Favorite;
use Tuto\Entity\Lesson;
use Tuto\Entity\Tutorial;
use Tuto\Entity\TutorialParts;
use Tuto\Entity\User;
use Tuto\Entity\Comment;

$userRepo = $entityManager->getRepository(User::class);
$chapterRepo = $entityManager->getRepository(Chapter::class);
$tutoRepo = $entityManager->getRepository(Tutorial::class);
$partRepo = $entityManager->getRepository(TutorialParts::class);
$lessonsRepo = $entityManager->getRepository(Lesson::class);

if ($_GET['action']) {
    if ($_GET['action'] == 'addTuto') {
        $partsTest = ["Oui, bien sûr !", "Non, peut mieux faire."];
        $chapters = [4, 2];


        $user = $userRepo->find(12);
        $tuto = new Tutorial();
        $tuto->setWording("Doctrine 2 est-il un bon ORM ?");
        $tuto->setUser($user);
        $i = 0;
        foreach ($partsTest as $part) {
            $tutoPart = new TutorialParts();
            $tutoPart->setWording($part);
            $tutoPart->setIndexOrder($i);
            $tuto->addPart($tutoPart);
            $i++;
        }
        $entityManager->persist($tuto);
        foreach ($chapters as $idChapter) {
            $chapter = $chapterRepo->find($idChapter);
            $lesson = new Lesson();
            $lesson->setTutorial($tuto);
            $lesson->setChapter($chapter);
            $entityManager->persist($lesson);
        }


        $entityManager->flush();
    } else if ($_GET['action'] == 'addComment') {
        $commentTest = ["wording" => "Second", "user" => 12, "userAnswered" => 13, "tutorial" => 5];
        $user = $userRepo->find($commentTest["user"]);
        $userAnswered = $userRepo->find($commentTest["userAnswered"]);
        $tutorial = $tutoRepo->find($commentTest["tutorial"]);
        $comment = new Comment();
        $comment->setUser($user);
        $comment->setUserAnswered($userAnswered);
        $comment->setTutorial($tutorial);
        $comment->setWording($commentTest["wording"]);
        $entityManager->persist($comment);
        $entityManager->flush();
    } else if ($_GET['action'] == 'editTuto') {

        $lessonsDatabase = $lessonsRepo->findBy(array("tutorial" => 1));
        foreach ($lessonsDatabase as $val) {
            $entityManager->remove($val);
        }
        $partsDatabase = $partRepo->findBy(array("tutorial" => 1));
        foreach ($partsDatabase as $val) {
            $entityManager->remove($val);
        }

        $entityManager->flush();

        $partsTest = ["Non, peut mieux faire."];
        $chapters = [4, 1];

        $user = $userRepo->find(12);
        $tuto = ($tutoRepo->find(1)) ? $tutoRepo->find(1) : new Tutorial();
        $tuto->setWording("Doctrine 2 est-il un bon ?");
        $tuto->setUser($user);
        $i = 0;
        foreach ($partsTest as $part) {
            $tutoPart = new TutorialParts();
            $tutoPart->setWording($part);
            $tutoPart->setIndexOrder($i);
            $tuto->addPart($tutoPart);
        }
        $i++;
    }
    $entityManager->persist($tuto);

    foreach ($chapters as $idChapter) {
        $chapter = $chapterRepo->find($idChapter);
        $lesson = new Lesson();
        $lesson->setTutorial($tuto);
        $lesson->setChapter($chapter);
        $entityManager->persist($lesson);
    }

    $entityManager->flush();
}
