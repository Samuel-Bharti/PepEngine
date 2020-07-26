<!-- Peptide INFO/REDIRECT file With Working JSMOL viewer-->
<!-- Designed by Samuel Bharti -->

<?php include 'header.php';
        include 'functions.php';

                    $link= mysqli_connect("localhost","u375744963_pepe","pep@(120)#","u375744963_pepdata");
                    if (mysqli_connect_error()) 
                        {
                            echo "There was a error"; 
                        }
                    $pepid = $_POST['nav_search'];
                    $query = "SELECT * FROM main_table WHERE pep_id = '$pepid' ";
                    $result = mysqli_query($link,$query);
                    $row = mysqli_fetch_assoc($result);
                    $pdb_url = './solids/pdb/' .$pepid. '.pdb';
                    $sdf_url = './solids/sdf/' .$pepid. '.sdf';
                    $pdb_back_url = './solids/pdb/' .$row['back_id']. '.pdb';
                    $sdf_back_url = './solids/sdf/' .$row['back_id']. '.sdf';
                    $spof = 'javascript:Jmol.script(jmolApplet0,"spin off")';
                    $spon = 'javascript:Jmol.script(jmolApplet0,"spin on")';
                    echo "<section class='pepinfo'>
                                <div class='row'>
                                <div class='col span-1-of-2 pepbox'>
                                <table class='tg'>
                                <tr>
                                <th class='tg-1wig'>ID</th>
                                <th class='tg-1wig'>Details</th>
                                </tr><tr>
                                <td class='tg-0lax'>PepID:</td>
                                <td class='tg-0lax'>" . $row['pep_id'] . "</td>
                                </tr><tr>
                                <td class='tg-hmp3'>Name of Peptide: </td>
                                <td class='tg-hmp3'>" . $row['name_of_peptide'] . "</td>
                                </tr><tr>
                                <td class='tg-0lax'>Sequence:</td>
                                <td class='tg-0lax'>" . $row['sequence'] . "</td>
                                </tr><tr>
                                <td class='tg-hmp3'>Sequence Length: </td>
                                <td class='tg-hmp3'>" . $row['sequence_length'] . "</td>
                                </tr><tr>
                                <td class='tg-0lax'>Backbone Sequence:</td> 
                                <td class='tg-0lax'>" . $row['backbone_sequence'] . "</td>
                                </tr><tr>
                                <td class='tg-hmp3'>Backbone Length: </td>
                                <td class='tg-hmp3'>" . $row['backbone _sequence_length'] . "</td>
                                </tr><tr>
                                <td class='tg-0lax'>Molecular Weight (amu):</td> 
                                <td class='tg-0lax'>" . $row['mol_weight_a_m_u'] . "</td>
                                </tr><tr>
                                <td class='tg-hmp3'>Molecular Formula:</td> 
                                <td class='tg-hmp3'>" . $row['molecular_formula'] . "</td>
                                </tr><tr>
                                <td class='tg-0lax'>R_Value:</td>
                                <td class='tg-0lax'>" . $row['r _value'] . "</td>
                                </tr><tr>
                                <td class='tg-hmp3'>Residue Involved:</td> 
                                <td class='tg-hmp3'>" . $row['residue_involved'] . "</td>
                                </tr><tr>
                                <td class='tg-0lax'>Phi Value:</td>
                                <td class='tg-0lax'>" . $row['phi'] . "</td>
                                </tr><tr>
                                <td class='tg-hmp3'>Psi Value:</td>
                                <td class='tg-hmp3'>" . $row['psi'] . "</td>
                                </tr><tr>
                                <td class='tg-0lax'>Omega Value:</td>
                                <td class='tg-0lax'>" . $row['omega'] . "</td>
                                </tr><tr>
                                <td class='tg-hmp3'>N-Terminal Modification:</td> 
                                <td class='tg-hmp3'>" . $row['n_terminal_modification'] . "</td>
                                </tr><tr>
                                <td class='tg-0lax'>C-Terminal Modification:</td> 
                                <td class='tg-0lax'>" . $row['c_terminal_modification'] . "</td>
                                </tr><tr>
                                <td class='tg-hmp3'>Conformation:</td> 
                                <td class='tg-hmp3'>" . $row['structural_conformation'] . "</td>
                                </tr><tr>
                                <tr><td class='tg-0lax'>Method: </td>
                                <td class='tg-0lax'>" . $row['method'] . "</td>
                                </tr></table></div>
                                
                                <div class ='col span-1-of-2 pepbox'>
                                <div id='appdiv'></div>
                                <a class='submit btn-full sdf' href=javascript:Jmol.script(jmolApplet0,'load" .$pdb_url. "')>Main model</a>
                                <a class='submit btn-full sdf' href=javascript:Jmol.script(jmolApplet0,'load" .$pdb_back_url. "')>Backbone model</a>
                                <a class='submit btn-full sdf' href='".$spon."'>Spin on</a>
                                <a class='submit btn-full sdf' href='".$spof."'>Spin off</a>                                
                                <br><br>
                                
                                <h4> Reference </h4><br>
                                <p><a href='". $row['link_to_reference']. "' target=_blank>".$row['referrence']."</a></p><br><br>
                                <a class='submit btn-full pdb' href='". $pdb_url. "'download> Download PDB </a> 
                                <br><br><br>
                                <a class='submit btn-full sdf' href='". $sdf_url. "' download>Download SDF </a>
                                </div>
                                </div></div>";

                    mysqli_close($link);
            ?>              
        <!--<div class="jmolbtns">
            <a class='submit btn-full sdf' href="javascript:Jmol.script(jmolApplet0,'spin on')">Spin on</a>
            <a class='submit btn-full sdf' href="javascript:Jmol.script(jmolApplet0,'spin off')">Spin off</a> 
        </div>-->
    <script type="text/javascript" src="./resources/js/JSmol.min.js"></script>
        <script type="text/javascript">
            Jmol._isAsync = false;
            var jmolApplet0; 
            var s = document.location.search;
            Jmol._debugCode = (s.indexOf("debugcode") >= 0);
            jmol_isReady = function(applet) 
                {
                    Jmol._getElement(applet, "appletdiv").style.border="4px solid black"
                }		
            var Info = 
                {
                    width: 435,
                    height: 300,
                    debug: false,
                    color: 'black',         //"0xFFFFFF" white color
                    addSelectionOptions: false,
                    use: "HTML5",   // JAVA HTML5 WEBGL are all options 
                    j2sPath: "./resources/js/j2s", // this needs to point to where the j2s directory is.
                    jarPath: "./java",// this needs to point to where the java directory is.
                    jarFile: "JmolAppletSigned.jar",
                    isSigned: true,
                    script: "set zoomlarge false;set antialiasDisplay",
                    serverURL: "https://chemapps.stolaf.edu/jmol/jsmol/php/jsmol.php",
                    readyFunction: jmol_isReady,
                    disableJ2SLoadMonitor: true,
                    disableInitialConsole: true,
                    allowJavaScript: true,
                }
            $(document).ready(function() 
                    {
                      $("#appdiv").html(Jmol.getAppletHtml("jmolApplet0", Info))
                    })
            var lastPrompt=0;
        </script>

<?php  footer(); ?>









