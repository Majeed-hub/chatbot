<?php

include 'config.php';

$searchText = $_POST['speechText'];

// search query $query = 'SELECT * FROM queries WHERE question like "%'.$searchText.'%" or content like "%'.$searchText.'%" or link like "%'.$searchText.'%"';

//$query=$mysqli->query("SELECT * FROM queries WHERE  question='$queryy'") or die($mysqli->error());

$searchText = str_replace(array("."), '', $searchText);


$query = 'SELECT * FROM queries WHERE question like "%'.$searchText.'%"';

$result = mysqli_query($con,$query);

$html = '';
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $title = $row['question'];
        $content = $row['answer'];
        //$shortcontent = substr($content, 0, 160)."...";
        //$link = $row['link'];

        // Creating HTML structure
        $html .= '<div style="width:40%;" class="con1 alert alert-danger" role="alert">';
        $html .= '<i class="fas fa-robot"></i>';
        $html .= '<p>'.$title.'</p>';
        $html .= '<p>'.$content.'</p>';
        $html .= '</div>';

        $html .= '<div class="bu">';
        $html .= '<i class="fas fa-bin"></i><a href="chat_homepage_voice.php" class="btn btn-danger">Clear</a>';
        $html .= '</div>';

    }
}else{


    $query="INSERT INTO u_queries (question) VALUES ('$searchText')";
    mysqli_query($con,$query); 

    $html .= '<div style="width:40%;" class="con1 alert alert-danger" role="alert">';
    $html .= '<i class="fas fa-robot"></i>';
    $html .= '<p>Sorry Currently, I dont have the answer for this query. Please try to ask me after 5 Minutes.!</p>';
    $html .= '</div>';


    $html .= '<div class="bu">';
    $html .= '<i class="fas fa-bin"></i><a href="chat_homepage_voice.php" class="btn btn-danger">Clear</a>';
    $html .= '</div>';


}


echo $html;
exit;
