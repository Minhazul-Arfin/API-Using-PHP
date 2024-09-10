<?php
    $connection = mysqli_connect("localhost","root","","phpapitest");
    $response = array();

    if($connection){
        $sql1 = "select * from academic_qualifications";
        $result1 = mysqli_query($connection, $sql1);
        $response1 = array();

        if($result1){
            header("Content-Type: JSON");
            $i = 0;
            #First Table
            while($row = mysqli_fetch_assoc($result1)){
                $response1[$i]['id'] = $row['CriteriaId'];
                $response1[$i]['title'] = $row['CriteriaTitle'];
                $response1[$i]['description'] = $row['CriteriaDescription'];                
                $i++;
            }

            echo json_encode($response1, JSON_PRETTY_PRINT);
        }
            
        
        // #Second Table
        // $sql2 = "select * from specific_programs_requirements";
        // $result2 = mysqli_query($connection, $sql2);
        // $response2 = array();

        // if($result2){
        //     header("Content-Type: JSON");
        //     $i = 0;
        //     while($row = mysqli_fetch_assoc($result2)){
        //         $response2[$i]['id'] = $row['CriteriaId'];
        //         $response2[$i]['title'] = $row['CriteriaTitle'];
        //         $response2[$i]['description'] = $row['CriteriaDescription'];                
        //         $i++;
        //     }

        //     echo json_encode($response2, JSON_PRETTY_PRINT);
        // }

            
    }else{
        echo "Database Connection Failed!!!";
    }

?>