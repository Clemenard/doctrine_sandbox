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

$userRepo = $entityManager->getRepository(User::class);
$chapterRepo = $entityManager->getRepository(Chapter::class);

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

        echo $tuto;
    }
}
