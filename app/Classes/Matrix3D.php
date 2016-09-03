<?php

/*
* This file contains the Matrix3D class that evaluates input data
*/

namespace App\Classes;

class Matrix3D
{

    protected $result = [];
    protected $matrix = [];
    protected $status = true;
    protected $N;
    protected $M;
    protected $opInd = 0;

    /*
    * @method Array evaluate
    * 
    * @params input string
    */
    public function evaluate($input)
    {

        $operation = $input['cases'];

        $ops = explode("\r\n",$operation);

        if (count($ops) > 0) {
            $testCase = $ops[0];
            $results = $this->init($ops);
            return $results;
        } else {
            return false;
        }
    }

    /*
    * @method Array init
	*
	* @param Array ops
    */
    public function init($ops){
    	for($i = 0 ; $i < count($ops) ; $i++){
    		$clanOp = trim($ops[$i]);

    		$cantOperators = explode(" ",$clanOp);

    		$this->status = $this->checkRow($clanOp);

    		if(!$this->status){
    			return false;
    		}

    		if(count($cantOperators) == 2 && $this->status){
    			for ($x = 0; $x < $this->N; $x++){
	                for ($y = 0; $y < $this->N; $y++){
	                    for ($z = 0; $z < $this->N; $z++){
	                        $this->matrix[$x][$y][$z] = 0;
	                    }
	                }
	            }
    		}

    		if(count($cantOperators) > 2 && $this->status){
    			$this->operate($clanOp);
    		}
    	}

    	return [
    		'results' => $this->result
    	];
    }

    /*
    * @method Bool chechRow
    *
    * @param String row
    */
    public function checkRow($row){
    	$vals = explode(" ", $row);

    	if ($vals[0] == 'UPDATE' || $vals[0] == 'QUERY') {
    		array_shift($vals);
    	}

    	switch (count($vals)) {
        	case 1:
        		$status = (1 <= $vals[0] && $vals[0] <= 50) ? true : false;
        		break;

        	case 2:
        		$this->N = $vals[0];
        		$this->M = $vals[0];
        		$this->opInd = 0;
        		$status = (1 <= $this->N && $this->N <= 100 && 1 <= $this->M && $this->M <= 1000) ? true : false;
        		break;

        	case 4:
        		$status = (1 <= $vals[0] && $vals[0] <= $this->N && 1 <= $vals[1] && $vals[1] <= $this->N && 1 <= $vals[2] && $vals[2] <= $this->N && $vals[3] && -1000000000 && $vals[3] <= 1000000000) ? true : false;
        		$this->opInd++;
        		break;

        	case 6:
        		$this->opInd++;
        		$status = (1 <= $vals[0] && $vals[0] <= $vals[3] && $vals[3] <= $this->N && 1 <= $vals[1] && $vals[1] <= $vals[4] && $vals[4] <= $this->N && 1 <= $vals[2] && $vals[2] <= $vals[5] && $vals[5] <= $this->N) ? true : false;
        		break;
        	
        	default:
        		$status = false;
        		break;
        }

        return $status;
    }

    /*
    * @method Void operate
    *
    * @param String vals
    */
    public function operate($vals)
    {
    	$results = [];
    	$ops = explode(" ", $vals);

    	if($ops[0] == 'UPDATE'){
    		$this->update($ops[1],$ops[2],$ops[3],$ops[4]);
    	}

    	if($ops[0] == 'QUERY'){
    		$this->result[] = $this->query($ops[1],$ops[2],$ops[2],$ops[4],$ops[5],$ops[6]);
    	}
    }

    /*
    * @method Integer query
    * 
    * @param Integer x1
    * @param Integer y1
    * @param Integer z1
    * @param Integer x2
    * @param Integer y2
    * @param Integer z2
    */
    public function query( $x1, $y1, $z1, $x2, $y2, $z2)
    {
        $sum = 0;

        for ($x = $x1-1 ; $x <= $x2-1 ; $x++){
            for ($y = $y1-1; $y <= $y2-1 ; $y++){
                for ($z = $z1-1 ; $z <= $z2-1 ; $z++){
                    $sum += $this->matrix[$x][$y][$z];
                }
            }
        }

        return $sum;
    }

    /*
    * @method Void update
    *
    * @param Integer x
    * @param Integer y
    * @param Integer z
    * @param Integer w
    */
    public function update( $x, $y, $z, $w)
    {
        $this->matrix[$x-1][$y-1][$z-1] = $w;
    }
}