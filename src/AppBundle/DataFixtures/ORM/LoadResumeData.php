<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Resume;

class LoadResumeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $resumeIT = new Resume();
        $resumeIT->setName('Pavel Durov');
        $resumeIT->setBirthday(new \DateTime('1993-05-12'));
        $resumeIT->setJobTitle('Web Developer');
        $resumeIT->setCategory($this->getReference('it-category'));
        $resumeIT->setCity('Lviv');
        $resumeIT->setEmployment('Full employment');
        $resumeIT->setExperience(2);
        $resumeIT->setEducation('Higher education');
        $resumeIT->setSkills('Object Oriented PHP Developer (PHP5). PHP (5, 4 and 3), MySQL, XHTML / HTML, JavaScript, CSS, Symfony Framework, PEAR, Smarty Template Engine, GIT Version Control, Subversion Version Control (user and Admin), CVS (concurrent Versioning System), MVC (Model View Controller).');
        $resumeIT->setEmail('durov@vk.com');
        $resumeIT->setPhone('096-786-78-94');
        $resumeIT->setCreatedAt(new \DateTime());

        $manager->persist($resumeIT);
        $manager->flush();

        $resumeArt = new Resume();
        $resumeArt->setName('Irina Frolova');
        $resumeArt->setBirthday(new \DateTime('1991-08-19'));
        $resumeArt->setJobTitle('Art Director');
        $resumeArt->setCategory($this->getReference('art-category'));
        $resumeArt->setCity('Odesa');
        $resumeArt->setEmployment('Part-time');
        $resumeArt->setExperience(1);
        $resumeArt->setEducation('Secondary school');
        $resumeArt->setSkills('Well versed with Visualizing & designing, Adobe Photoshop, Adobe Illustrator & CorelDraw etc. Good at handling multi-level tasks from small ads to thematically brochures and visual merchandising. Adept at analyzing clients requirement & providing innovative ideas of advertising & promotion. Effective at interpersonal communication & relationship building with team and Clientele.');
        $resumeArt->setEmail('frolova@gmail.com');
        $resumeArt->setPhone('093-831-22-57');
        $resumeArt->setCreatedAt(new \DateTime());

        $manager->persist($resumeArt);
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
}
