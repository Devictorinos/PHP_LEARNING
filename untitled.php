<?php

echo "here";
echo "here";
    $xml = '<students> 
            <student> 
            <student_number>12121212</student_number> 
            <f_name>Alan</f_name> 
            <s_name>Hannaway</s_name> 
            <module>SWD</module> 
            <lecturetime>1:00</lecturetime> 
            <lab_time>2:30</lab_time> 
            <group>A</group> 
    </student> 

    <student> 
            <student_number>13131313</student_number> 
            <f_name>Peter</f_name> 
             <s_name>Jones</s_name> 
             <module>PDS</module> 
             <lecturetime>12:00</lecturetime> 
             <lab_time>1:30</lab_time> 
             <group>B</group> 
    </student> 

    <student> 
             <student_number>14141414</student_number> 
             <f_name>Clare</f_name> 
             <s_name>Murphy</s_name> 
             <module>SWD</module> 
             <lecturetime>1:00</lecturetime> 
             <lab_time>2:30</lab_time> 
             <group>B</group> 
    </student> 
    <student> 
            <student_number></student_number> 
            <f_name>Jack</f_name> 
            <s_name>Cobane</s_name> 
            <module>PDS</module> 
            <lecturetime></lecturetime> 
            <lab_time></lab_time> 
            <group></group> 
    </student> 

    <student> 
             <student_number>18181818</student_number> 
             <f_name>Rachel</f_name> 
             <s_name>Hartings</s_name> 
             <module>SWD</module> 
             <lecturetime>1:00</lecturetime> 
             <lab_time>2:30</lab_time> 
             <group></group> 
    </student> 

    <student> 
             <student_number></student_number> 
             <f_name>John</f_name> 
             <s_name>Molloy</s_name> 
             <module></module> 
             <lecturetime></lecturetime> 
             <lab_time>11:30</lab_time> 
             <group>A</group> 
    </student> 

    <student> 
             <student_number>20202020</student_number> 
             <f_name>David</f_name> 
             <s_name>Hutchinson</s_name> 
             <module>SWD</module> 
             <lecturetime>1:00</lecturetime> 
             <lab_time>2:30</lab_time> 
             <group>A</group> 
    </student> 
</students>';

$students = explode("<student>", $xml);
$stArr = array();


foreach ($students as $student) {

        preg_match_all("/<.*?>(.*?)<\/.*?>/", $student, $matches);
        $stArr[] = $matches[1];
}


echo "<table border=\"1\" >";
echo "<tr>";
echo "<th>student_number</th>
      <th>f_name</th>
      <th>s_name</th>
      <th>module</th>
      <th>lecturetime</th>
      <th>lab_time</th>
      <th>group</th>";
echo "</tr>";
echo "<tr>";
foreach ($stArr as $arr) {

    foreach ($arr as $key => $value) {
         echo "<td>".$value."</td>";
    }

    echo "</tr>";
}

echo "</table>";
