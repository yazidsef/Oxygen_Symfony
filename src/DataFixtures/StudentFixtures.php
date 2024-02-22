<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;

class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // add data to student table
        $students = [
            [
                'firstName' => 'Asma',
                'lastName' => 'Jaballah',
                'email' => 'asma@gmail.com',
                'tel' => 1234567890,
                'formation' => 'PO Marketing',
                'birthday' => '1990-01-01',
                'address' => 'Paris',
                'degree' => 'Bac+5',
                'avatar_image' => 'https://media.licdn.com/dms/image/D4E03AQGj9nhRHrjBzQ/profile-displayphoto-shrink_800_800/0/1684840480045?e=1712188800&v=beta&t=Y_dABFY94yxvlDfcQT7XR3X2_onGQlIdKh66PcS_v-c',
            ],
            [
                'firstName' => 'Kevin',
                'lastName' => 'Girault',
                'email' => 'kevin@gmail.com',
                'tel' => 1234567890,
                'formation' => 'Junior Dev Web',
                'birthday' => '1986-07-08',
                'degree' => 'Bac+3',
                'address' => 'Etrangers',
                'avatar_image' => 'https://media.licdn.com/dms/image/D5603AQFzhJJ8v2K2QQ/profile-displayphoto-shrink_800_800/0/1685949560183?e=1711584000&v=beta&t=PLV-fVRuPbBUAdYOBGV1M3TFo-ao0k0nAEW-6jfBrOk',
            ],
            [
                'firstName' => 'Joël',
                'lastName' => 'Mayemba',
                'email' => 'joel@gmail.com',
                'tel' => 1234567890,
                'formation' => 'Angular Dev',
                'birthday' => '1995-01-01',
                'degree' => 'Bac+2',
                'address' => 'Paris',
                'avatar_image' => 'https://media.licdn.com/dms/image/D4E03AQF_1iyiRToEHQ/profile-displayphoto-shrink_800_800/0/1701904115437?e=1711584000&v=beta&t=z3HTNjBHIO5npMAXU5A5VhmRBrHwu499FrSaqgjnkoY',
            ],
            [
                'firstName' => 'Lucas',
                'lastName' => 'Boillot',
                'email' => 'lucas@gmail.com',
                'tel' => 1234567890,
                'formation' => 'ReactJs',
                'birthday' => '1989-01-01',
                'degree' => 'Bac+3',
                'address' => 'Liverpool',
                'avatar_image' => 'https://avatars.githubusercontent.com/u/25879136?v=4',
            ],
            [
                'firstName' => 'Quentin',
                'lastName' => 'Guillemineau',
                'email' => 'Quentin@gmail.com',
                'tel' => 1234567890,
                'formation' => 'Data Engineer',
                'birthday' => '1989-01-01',
                'degree' => 'Bac+2',
                'address' => 'Tours',
                'avatar_image' => 'https://i.postimg.cc/66b3Cffp/Quentin.png',
            ],
            [
                'firstName' => 'Yazid',
                'lastName' => 'Sefsaf',
                'email' => 'Yazid@gmail.com',
                'tel' => 1234567890,
                'formation' => 'Data Analyst',
                'birthday' => '1997-01-01',
                'degree' => 'Bac+3',
                'address' => 'Paris',
                'avatar_image' => 'https://cdn.discordapp.com/attachments/1186683768640122982/1187052343859089549/ayzd.jpg?ex=65c3a025&is=65b12b25&hm=4fc40165ef44b2f148d9f1be816925f478fa227452980b207de6b157007b3af8&',
            ],
            [
                'firstName' => 'Julia',
                'lastName' => 'Pellegrini',
                'email' => 'Julia@gmail.com',
                'tel' => 1234567890,
                'formation' => 'PO Manager',
                'birthday' => '1997-01-01',
                'degree' => 'Bac+3',
                'address' => 'Amsterdam',
                'avatar_image' => 'https://images.unsplash.com/photo-1551292831-023188e78222?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTE0fHxwb3J0cmFpdHxlbnwwfDB8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60',
            ],
            [
                'firstName' => 'Eric',
                'lastName' => 'Clampton',
                'email' => 'Eric@gmail.com',
                'tel' => 1234567890,
                'formation' => 'Junior Desinger',
                'birthday' => '1992-01-01',
                'degree' => 'Bac+3',
                'address' => 'Mandrid',
                'avatar_image' => 'https://images.unsplash.com/photo-1562159278-1253a58da141?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MzB8fHBvcnRyYWl0JTIwbWFufGVufDB8MHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60',
            ],
            [
                'firstName' => 'Jess',
                'lastName' => 'Flax',
                'email' => 'Jess@gmail.com',
                'tel' => 1234567890,
                'formation' => 'Nurse Assistant',
                'birthday' => '1999-01-01',
                'degree' => 'Bachelor',
                'address' => 'Lyon',
                'avatar_image' => 'https://images.unsplash.com/photo-1450297350677-623de575f31c?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MzV8fHdvbWFufGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60',
            ],
            [
                'firstName' => 'Julia',
                'lastName' => 'Wilson',
                'email' => 'Julia@gmail.com',
                'tel' => 1234567890,
                'formation' => 'Dev Web',
                'birthday' => '1996-01-01',
                'degree' => 'Bac+3',
                'address' => 'Liverpool',
                'avatar_image' => 'https://images.unsplash.com/photo-1604004555489-723a93d6ce74?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=934&q=80',
            ],
            [
                'firstName' => 'Jess',
                'lastName' => 'Watson',
                'email' => 'Jess@gmail.com',
                'tel' => 1234567890,
                'formation' => 'Data Scientist',
                'birthday' => '1997-01-01',
                'degree' => 'Bac+3',
                'address' => 'Kiev',
                'avatar_image' => 'https://images.unsplash.com/photo-1596815064285-45ed8a9c0463?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1215&q=80',
            ],
            [
                'firstName' => 'Hazard',
                'lastName' => 'Eden',
                'email' => 'Eden@gmail.com',
                'tel' => 1234567890,
                'formation' => 'Social Marketing',
                'birthday' => '1996-01-01',
                'degree' => 'Bac+4',
                'address' => 'Lille',
                'avatar_image' => 'https://cdn.discordapp.com/attachments/1186683768640122982/1187035817877708841/371521463_2619947881488781_2593667617711553075_n.jpg?ex=65cccb41&is=65ba5641&hm=56ba502d8bfbbd399fdba3d0851f8e4872c486b5637f5167343c3ca879eba5f5&',
            ],
            [
                'firstName' => 'Ricky',
                'lastName' => 'James',
                'email' => 'James@gmail.com',
                'tel' => 1234567890,
                'formation' => 'Nurse Assistant',
                'birthday' => '1998-01-01',
                'degree' => 'Bachelor',
                'address' => 'Paris',
                'avatar_image' => 'https://images.unsplash.com/photo-1583195764036-6dc248ac07d9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2555&q=80',
            ],
        ];
        foreach ($students as $studentData) {
            $student = (new Student())
                ->setFirstName($studentData['firstName'])
                ->setLastName($studentData['lastName'])
                ->setEmail($studentData['email'])
                ->setTel($studentData['tel'])
                ->setDegree($studentData['degree'])
                ->setBirthday(new DateTime($studentData['birthday']))
                ->setAddress($studentData['address'])
                ->setFormation($studentData['formation'])
                ->setAvatarImage($studentData['avatar_image']);

            $manager->persist($student);
            
        }

        $manager->flush();
    }
}
