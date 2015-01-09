<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Job;

class LoadJobData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $jobPHPDeveloper = new Job();
        $jobPHPDeveloper->setTitle('PHP-developer');
        $jobPHPDeveloper->setCompany('FaceBook');
        $jobPHPDeveloper->setCity('Kyiv');
        $jobPHPDeveloper->setSalary(1400);
        $jobPHPDeveloper->setEmployment('Full employment');
        $jobPHPDeveloper->setExperience(3);
        $jobPHPDeveloper->setEducation('Higher');
        $jobPHPDeveloper->setCategory($this->getReference('it-category'));
        $jobPHPDeveloper->setDescription('Our technology team is a great place to work. Full of ideas and innovation, it needs similarly creative minds to help carry on the startling progress already made. We are looking for people who enjoy working in a team environment, whilst still having the discipline to do individual work at times. We are flexible in our structure, and people will always have the chance to learn other skills as time progresses, as we actively encourage it. There is obviously opportunity to impress and progress through the company if desired. Here you have the opportunity to help shape what we create. The primary responsibilities are, but not limited to: PHP background, including ideally with a basic understanding of PHP 5.3. Familiarity with OOP, design and architectural patterns such as MVC. Basic understanding of XHTML, HTML5 and CSS. Basic knowledge of MySQL.');
        $jobPHPDeveloper->setName('Mark Zuckerberg');
        $jobPHPDeveloper->setPhone('063-543-8854');
        $jobPHPDeveloper->setCreatedAt(new \DateTime());

        $manager->persist($jobPHPDeveloper);
        $manager->flush();

        $jobDesigner = new Job();
        $jobDesigner->setTitle('Graphic designer');
        $jobDesigner->setCompany('Sky-Art');
        $jobDesigner->setCity('Cherkasy');
        $jobDesigner->setSalary(950);
        $jobDesigner->setEmployment('Part-time');
        $jobDesigner->setExperience(2);
        $jobDesigner->setEducation('Secondary special');
        $jobDesigner->setCategory($this->getReference('art-category'));
        $jobDesigner->setDescription('Graphic designers are visual communicators who design and develop print and electronic media, such as magazines, television graphics, logos and websites. They may be employed by advertising firms, design companies, publishers and other businesses that need design professionals. Most graphic designers earn bachelors degrees. Along with formal education, graphic designers must have artistic capacity and strong verbal, visual and written communication skills. Graphic designers must also have strong portfolios that showcase examples of their best work, which employers generally consider during the hiring process. Designers often work independently and must meet strict deadlines, so the ability to manage time and stay on schedule is important. Business and sales skills are also beneficial for this career, especially for graphic designers who are self employed.');
        $jobDesigner->setName('Valeria Nikols');
        $jobDesigner->setPhone('096-896-9873');
        $jobDesigner->setCreatedAt(new \DateTime());

        $manager->persist($jobDesigner);
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}
