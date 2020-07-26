<?php

    function tableHeading() {
        $type = $_POST['type'];
        if($type == 'dpa') {
            echo '<div class="heading">
                    <h2>Dehydro-Phenyl-Alanine containing peptides</h2>
                </div>';
        }
        else {
            echo '<div class="heading">
                    <h2>Amino-Iso-Butyric Acid containing peptides</h2>
                </div>';
        }
    }
    function pepTable() {
        
                     $link= mysqli_connect("localhost","u375744963_pepe","pep@(120)#","u375744963_pepdata");
                    if (mysqli_connect_error()) 
                        {
                            echo "There was a error"; 
                        }
                    $type = $_POST['type'];
                    $query = "SELECT * FROM main_table WHERE type = '$type' ";
                    
                    $result = mysqli_query($link,$query);
                    echo "
                        <div class ='tbody'>
                        <table class='tg full' border=1 align='center'>
                        <tr>
                        <th class='tg-1wig'>PepID</th>
                        <th class='tg-1wig'>Name of Peptide</th>
                        <th class='tg-1wig'>Sequence</th>
                        <th class='tg-1wig'>Structure</th>
                        <th class='tg-1wig'>Profile</th>
                        </tr>";

                    while($row = mysqli_fetch_assoc($result))
                        {
                            $pdb_url = './solids/pdb/' .$row['pep_id']. '.pdb';
                            $sdf_url = './solids/sdf/' .$row['pep_id']. '.sdf';
                            echo "<tr>
                                    <td class='tg-0lax'>" . $row['pep_id'] . "</td>
                                    <td class='tg-hmp3'>" . $row['name_of_peptide'] . "</td>
                                    <td class='tg-0lax'>" . $row['sequence'] . "</td>
                                    <td class='tg-hmp3'> <a class='sdf' href='" .$pdb_url. "'download> PDB </a>
                                    <a class='pdb' href='" .$sdf_url. "'download> SDF </a></td>
                                    <td class='tg-0lax'>
                                    <form action='pepinfo.php' method='post'id='view'>
                                    <input type='hidden' name='nav_search' value='". $row['pep_id']."'>
                                    <button type='submit' class='submit'>View</button></form></td></tr>";
                        }
                    echo "</table></div>";
                     mysqli_close($link);
    }
    function footer() {
                echo '<footer class="page-footer font-small unique-color-dark pt-4">
                        <div class="divider"></div>
                      <div class="footer-copyright text-center py-3">© 2019 Copyright
                        <a href="./home.php">    Cite PepEngine</a>
                      </div>
                    </footer>
                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                    </body>
                    </HTML>';
    }
?>
<!--
                -->
