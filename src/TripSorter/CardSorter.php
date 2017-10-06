<?php

namespace PropertyFinder\TripSorter;

/**
 * CardSorted class. 
 * @author Stoimenovski Stojan
 */
class CardSorter
{
    /**
     * Assigned cards for sorting.
     * Array of objects
     * @var array 
     */
    public $cards;
    
    /**
     * Array of departure points
     * @var array 
     */
    public $nodes;
    
    /**
     * Array of edges between departure and arrival points
     * @var array
     */
    public $edges;
    
    /**
     * Array of edges for each point (Arrival and departure)
     * @var array 
     */
    public $nodeEdges;

    /**
     * @param array $cards
     */
    public function __construct($cards)
    {
        foreach($cards as $c)
        {
            $this->nodes[] = $c->getFrom();
            $this->edges[] = ['from' => $c->getFrom(), 'to' => $c->getTo()];
        }
        
        $this->cards = $cards;
    }
    
    /**
     * Get edges for each point.
     * 
     */
    private function getNodeEdges()
    {
       foreach($this->nodes as $n)
       {
           foreach($this->edges as $e)
           {
               if($n == $e['from'])
                   $this->nodeEdges[$n]['to'][] = $e['to'];
               elseif ($n == $e['to'])
                   $this->nodeEdges[$n]['from'][] = $e['from'];
           }
       }
    }

    
    /**
     * Sorting of cards
     * @return mixed
     */
    private function sort()
    {
        $S = []; //Set of all nodes with no incoming edge
        $cyclic = false; //Is graph cyclic
        
        $this->getNodeEdges();
        $nodes = $this->nodeEdges;
        
        foreach($nodes as $k => $v)
        {
            if(!isset($v['from']))
                $S[] = $k; 
        }
        
        while(!empty($S))
        {
            $n = array_shift($S);
            $L[] = $n; //list that will contain the sorted elements
            
            if(isset($nodes[$n]['to']))
            {
                foreach($nodes[$n]['to'] as $to)
                {
                    if(isset($nodes[$to]['from']))
                       $nodes[$to]['from'] = array_diff($nodes[$to]['from'], [$n]);
                    
                    if(empty($nodes[$to]['from']))
                        $S[] = $to;
                }
            }
            $nodes[$n]['to'] = [];
        }
        
        //Check is graph cyclic
        foreach($nodes as $k => $v)
        {
            if(!empty($v['from']) || !empty($v['to']))
                $cyclic = true;
        }
        
        return $cyclic ? NULL : $L;
    }
    
    
    /**
     * 
     * @param array $sortedCards
     */
    private function cardDetails($sortedCards)
    {
        $boardingCards = [];
        
        foreach($sortedCards as $k => $v)
        {
            $from = $v;
            
            if(isset($sortedCards[$k + 1]))
                $to = $sortedCards[$k + 1];
            else 
                $to = '';
            
            foreach($this->cards as $c)
            {
                if($from === $c->getFrom() && $to == $c->getTo())
                    $boardingCards[] = $c;
            }
            
        }
        
        $this->printDetails($boardingCards);
    }
    
    
    /**
     * Print trip details
     * @param array $cards
     */
    private function printDetails($cards)
    {
        $step = 1;
        $description = '';
        
        foreach($cards as $c)
        {
            $description .= $step.") ". $c->description()."\n";
            $step++;
        }
        
        $description .= $step.") You have arrived at your final destination. \n";
        
        echo $description;
    }

    /**
     * Return trip details if all conditions are met otherwise print error.
     * @return string
     */
    public function tripDetails()
    {
       $sortedCards = $this->sort();
       
       if($sortedCards)
           return $this->cardDetails($sortedCards);
       else
           echo 'Something went wrong!';
        
    }
    
}
