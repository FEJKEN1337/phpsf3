<?php
namespace AppBundle\Services;

use Doctrine\ORM\EntityManager;

class dateManager {
    
    protected $repository;
    
    public function __construct(EntityManager $doctrine) {
        $this->repository = $doctrine;
    }
    public function showWeekFromCurrentDay() {
        $b = date('N');
        $weekFromToday = array($this->polishDateTranslate($b));
        
        for($i=1;$i<=6; $i++) {
            
            
            $b++;
            if($b == 8) {
                $b=1;
            }
            
            $polishDay = $this->polishDateTranslate($b);
            array_push($weekFromToday, $polishDay);
            
        }
        
        return $weekFromToday;
        //return $this->polishDateTranslate(date('N'));
        
    }
    
    
    public function workHours($hours_start, $hours_end, $weekendDiffer = null) {
    
    
    $hours = array();
    for($i=$hours_start; $i<=$hours_end; $i++) {
        array_push($hours, $i);
    }
        return $hours;
    }
    
    public function polishDateTranslate($dateNumber) {
        if($dateNumber <= 1 OR $dateNumber >=7) {
            //die();
        }
       $dates = array(1 => 'Pn.',
                      2 => 'Wt.',
                      3 => 'Śr.',
                      4 => 'Czw.',
                      5 => 'Piąt.',
                      6 => 'Sob.',
                      7 => 'Niedz.',
                      
               );
        
        return $dates[$dateNumber];
    }
    
    public function checkIfHoursColide($params) {
        $day = $params['day'];
        $month = $params['month'];
        $year = $params['year'];
        
        $fullDate="$day/$month/$year";
        
       $query = $this->repository
                ->getRepository("AppBundle:Registration")
                ->createQueryBuilder('p')
                ->select('p.od', 'p.do', 'p.dataRezerwacji', 'p.tor', 'p.imie')
                ->where("p.dataRezerwacji='$fullDate'")
                ->getQuery()->getResult();
        //return "PARA: " . var_dump($params);
      
          return $this->calculateColide($params, $query);
           //return $fullDate;
      
        
        
    }
    
    protected function calculateColide($params, $queryResult) {
        $halfHour = $params['polgodziny'] === 'halfHour' ? "30" : "00";
        $time = $params['time'];
        $tor = $params['tor'];
        
        
        foreach ($queryResult as $key) {
            //$odDB = intval(str_replace(":","",$key['od']));
            $odDB = strtotime($key['od']);
            $odParam = strtotime($time . ":" . $halfHour);
            if($key['tor'] == $tor){
                $sub = $odDB - $odParam;
                if($sub<0) {
                    
                } else {
                    $equal = $sub/60;
                return $equal;
                }
                
                
            } 
        }
        
        
        
    }
}
