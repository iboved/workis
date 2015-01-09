<?php

namespace AppBundle\Twig;

class SalaryExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('salary', array($this, 'salaryFilter')),
        );
    }

    public function salaryFilter($number, $decimals = 0, $decPoint = '.', $thousandsSep = ',')
    {
        $salary = number_format($number, $decimals, $decPoint, $thousandsSep);
        $salary = '$'.$salary;

        return $salary;
    }

    public function getName()
    {
        return 'salary_extension';
    }
}
