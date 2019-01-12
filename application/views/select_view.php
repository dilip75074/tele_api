<html xmlns="http://www.w3.org/1999/xhtml">  
   <head>  
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
      <title>Untitled Document</title>  
   </head>  
   <table border="1">  
      <tbody>  
         <tr>
            <td>first_name</td>
            <td>last_name</td>
            <td>gender</td>
            <td>dob</td>
            <td>country</td>
            <td>current_city</td>
            <td>mobile_number</td>
            <td>email_id</td>
            <td>password</td>
            <td>doj</td>
         </tr>  
         <?php  
         foreach ($h->result() as $row)  
         {  
            ?><tr>
            <td><?php echo $row->first_name;?></td> 
            <td><?php echo $row->last_name;?></td> 
            <td><?php echo $row->gender;?></td> 
            <td><?php echo $row->dob;?></td> 
            <td><?php echo $row->country;?></td> 
            <td><?php echo $row->current_city;?></td> 
            <td><?php echo $row->mobile_number;?></td> 
            <td><?php echo $row->email_id;?></td> 
            <td><?php echo $row->password;?></td> 
            <td><?php echo $row->doj;?></td> 
            </tr>  
         <?php }  
         ?>  
      </tbody>  
   </table>  
<body>
</body>  
</html>  