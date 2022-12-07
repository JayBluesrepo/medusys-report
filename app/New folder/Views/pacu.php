<?php
    echo view('includes/header',$patient, $post, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    
?>
 <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<!-----------------------------------PACU START----------------------------------->
<div role="tabpanel" class="tab-pane" id="settings">
    <section class="add-pacu">
        <h3>Add Post-Op Care Unit/Recovery</h3>
        <form id="add-pacu">
        <h5><b>Pain Score (0-10) (0:Min,10:Max)</b></h5>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <span>Post Procedure</span>
                </div>
                <div class="col-sm-5">
                    <select class="form-control" name="ps_postproc">
                        <option>Select pain score on arrival</option>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>Unable to score</option>
                    </select>
                </div>
                <div class="col-sm-3"></div>
            </div><!--row-->
            <div class="row" style="padding-top:12px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <span>30 Min</span>
                </div>
                <div class="col-sm-5">
                    <select class="form-control" name="ps_30mins">
                        <option>Select pain score in 30 min</option>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>Unable to score</option>
                    </select>
                </div>
                <div class="col-sm-3"></div>
            </div><!--row-->
            <div class="row" style="padding-top:12px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <span>One Hour</span>
                </div>
                <div class="col-sm-5">
                    <select class="form-control" name="ps_1hr">
                        <option>Select pain score in one hour</option>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>Unable to score</option>
                    </select>
                </div>
                <div class="col-sm-3"></div>
            </div><!--row-->
            <h5><b>Nausea & Vomiting Score (0-3)</b></h5>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <span>Post Procedure</span>
                </div>
                <div class="col-sm-5">
                    <select class="form-control" name="nvs_postproc">
                        <option>Select score at arrival</option>
                        <option>0-No Nausea</option>
                        <option>1-Mild Nausea not requiring treatment</option>
                        <option>2-Vomiting</option>
                        <option>Unable to score</option>
                    </select>
                </div>
                <div class="col-sm-3"></div>
            </div><!--row-->
            <div class="row" style="padding-top:12px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <span>30 Min</span>
                </div>
                <div class="col-sm-5">
                    <select class="form-control" name="nvs_30mins">
                        <option>Select score at 30 min</option>
                        <option>0-No Nausea</option>
                        <option>1-Mild Nausea not requiring treatment</option>
                        <option>2-Vomiting</option>
                        <option>Unable to score</option>
                    </select>
                </div>
                <div class="col-sm-3"></div>
            </div><!--row-->
            <div class="row" style="padding-top:12px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <span>One Hour</span>
                </div>
                <div class="col-sm-5">
                    <select class="form-control" name="nvs_1hr">
                        <option>Select score at 1 hour</option>
                        <option>0-No Nausea</option>
                        <option>1-Mild Nausea not requiring treatment</option>
                        <option>2-Vomiting</option>
                        <option>Unable to score</option>
                    </select>
                </div>
                <div class="col-sm-3"></div>
            </div><!--row-->
            <h5><b>Sedation Score (1-3)</b></h5>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <span>Post Procedure</span>
                </div>
                <div class="col-sm-5">
                    <select class="form-control" name="ss_postproc">
                        <option>Select sedation score on arrival</option>
                        <option>0-Awake</option>
                        <option>1-Mild,easy to rouse</option>
                        <option>2-Moderate,eay to rouse, unable to remain...</option>
                        <option>3-Difficult to rouse</option>
                        <option>Unable to score</option>
                    </select>
                </div>
                <div class="col-sm-3"></div>
            </div><!--row-->
            <div class="row" style="padding-top:12px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <span>30 Min</span>
                </div>
                <div class="col-sm-5">
                    <select class="form-control" name="ss_30mins">
                        <option>Select sedation score in 30 min</option>
                        <option>0-Awake</option>
                        <option>1-Mild,easy to rouse</option>
                        <option>2-Moderate,eay to rouse, unable to remain...</option>
                        <option>3-Difficult to rouse</option>
                        <option>Unable to score</option>
                    </select>
                </div>
                <div class="col-sm-3"></div>
            </div><!--row-->
            <div class="row" style="padding-top:12px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <span>One Hour</span>
                </div>
                <div class="col-sm-5">
                    <select class="form-control" name="ss_1hr">
                        <option>Select sedation score in 30 min</option>
                        <option>0-Awake</option>
                        <option>1-Mild,easy to rouse</option>
                        <option>2-Moderate,eay to rouse, unable to remain...</option>
                        <option>3-Difficult to rouse</option>
                        <option>Unable to score</option>
                    </select>
                </div>
                <div class="col-sm-3"></div>
            </div><!--row-->
            <div class="row" style="padding-top:12px;">
                <div class="col-sm-4"><label>Time Spent in Recovery (mins)</label></div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="time_spent">
                </div>
                <div class="col-sm-4"></div>
            </div><!--row-->
            <h5><b>Analgesia Supplement in Recovery</b></h5>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-6">
                    <div class= "box_1">
                        <input type="checkbox" class="switch_1" id="reco" onclick="recov()">
                    </div>
                </div>
            </div>
            <div class="analgesia">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <div class="form-check" id="id">
                            <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="intra_op">
                                <input type="checkbox" class="form-check-input" id="opi" value="Yes" name="intra_op" onclick="intra()">Intravenous Opioids
                                 <div class="tooltip-10">
                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <div class="right-10">
                                        <div class="text-content-10">
                                            <h6>Intravenous Opioids includes but not restricted to Fenatanyl,morphine,oxycodone,pethidina,Pentazocina,<br>bupranorphina,butorphenol,nalbuphine,hydromorphine,<br>hydrocodone,tapentadol.All dosages must be entered in milligram equvivalent only.</h6>
                                            <i></i>
                                        </div>
                                    </div>
                                </div>
                            </label>
                          <!--   <a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="Intravenous Opioids includes but not restricted to Fenatanyl,morphine,oxycodone,pethidina,Pentazocina,bupranorphina,butorphenol,nalbuphine,hydromorphine,hydrocodone,tapentadol.&nbsp;&nbsp; All dosages must be entered in milligram equvivalent only"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                        </div>
                        <div class="intra">
                            <div class="row" style="padding-top:15px;">
                                <div class="col-sm-12" id="id">
                                    <label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control" name="intra_name[]">&nbsp&nbsp
                                    <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="number" class="form-control" name="intra_dose[]">&nbsp&nbsp
                                    <button type="button" class="btn add1"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div><!--intra ends-->
                        <div class="form-check" id="id">
                            <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="oral_op">
                                <input type="checkbox" class="form-check-input" id="ora" value="Yes" name="oral_op" onclick="oral()">Oral Opiodis
                                <div class="tooltip-11">
                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <div class="right-11">
                                        <div class="text-content-11">
                                            <h6>Oral Opiodis includes but not restricted to codine,morphine,oxycodone,hydromorphine,<br>hydrocodone,tapentadol.All dosages must be entered in milligram equvivalent only.</h6>
                                            <i></i>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="oral">
                            <div class="row" style="padding-top:15px;">
                                <div class="col-sm-12" id="id">
                                    <label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control" name="oral_name[]">&nbsp&nbsp
                                    <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="number" class="form-control" name="oral_dose[]">&nbsp&nbsp
                                    <button type="button" class="btn add2"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div><!--oral ends-->
                        <div class="form-check" id="id">
                            <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="tram">
                                <input type="checkbox" class="form-check-input" id="tra" value="Yes" name="tram" onclick="tramadol()">Tramadol
                                <div class="tooltip-12">
                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <div class="right-12">
                                        <div class="text-content-12">
                                            <h6>All dosages must be entered in milligram equvivalent only</h6>
                                            <i></i>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        
                        </div>
                        <div class="tramadol">
                            <div class="row" style="padding-top:15px;">
                                <div class="col-sm-12" id="id">
                                    <label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control" name="tram_name[]">&nbsp&nbsp
                                    <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="number" class="form-control" name="tram_dose[]">&nbsp&nbsp
                                    <button type="button" class="btn add3"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div><!--tramadol ends-->
                        <div class="form-check" id="id">
                            <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="nsaid">
                                <input type="checkbox" class="form-check-input" id="nid" value="Yes" name="nsaid" onclick="nsa()">NSAID
                                <div class="tooltip-12">
                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <div class="right-12">
                                        <div class="text-content-12">
                                            <h6>All dosages must be entered in milligram equvivalent only</h6>
                                            <i></i>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="nsa">
                            <div class="row" style="padding-top:15px;">
                                <div class="col-sm-12" id="id">
                                    <label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control" name="nsa_name[]">&nbsp&nbsp
                                    <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="number" class="form-control" name="nsa_dose[]">&nbsp&nbsp
                                    <button type="button" class="btn add4"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div><!--nsa ends-->
                        <div class="form-check" id="id">
                            <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="paracetemol">
                                <input type="checkbox" class="form-check-input" id="temo" value="Yes" name="paracetemol" onclick="para()">Paracetemol
                                <div class="tooltip-12">
                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <div class="right-12">
                                        <div class="text-content-12">
                                            <h6>All dosages must be entered in milligram equvivalent only</h6>
                                            <i></i>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="para">
                            <div class="row" style="padding-top:15px;">
                                <div class="col-sm-12" id="id">
                                    <label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control" name="para_name[]">&nbsp&nbsp
                                    <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="number" class="form-control" name="para_dose[]">&nbsp&nbsp
                                    <button type="button" class="btn add5"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div><!--para ends-->
                        <div class="form-check" id="id">
                            <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="la_regi">
                                <input type="checkbox" class="form-check-input" id="reg" value="Yes" name="la_regi" onclick="regi()">LA Regimen
                            </label>
                        </div> 
                    </div><!--col-10-->
                </div><!--row-->
                <div class="regi">
                   <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4" style="padding:15px 0;">
                            <select class="form-control" id="dro" name="la_regimen_select" onclick="drop()">
                                <option value=''>Select</option>
                                <option>Intermittent Bolus</option>
                                <option>LA Infusion</option>
                                <option>PCEA</option>
                            </select>
                        </div>
                         <div class="col-sm-6"></div>
                   </div>
                </div>
                <div class="drop">
                    <h5><b>Total PACU (Reovery) LA & Adjuvant Consumption</b>
                     <div class="tooltip-13">
                           <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <div class="right-13">
                                <div class="text-content-13">
                                    <h6>If user enter % and vol(ml) only.The mg is calculated using the formula mg=(concentration*vol in ml*10 . However the user should be able to edit the mg and enter the mg directly.)</h6>
                                    <i></i>
                                </div>
                            </div>
                        </div>     
                    </h5>
                    <h6 style="margin-bottom:15px;"><b>LA Regimen</b>
                    <div class="tooltip-14">
                       <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <div class="right-14">
                            <div class="text-content-14">
                                <h6>Local Anasthetic solution(%) & volume(ml)-Ropivacaine,Bupivacaine,Levobupivacaine,Lignocaine plain,Lignocaine with or without adrenaline.</h6>
                                <i></i>
                            </div>
                        </div>
                    </div>      
                    </h6>
                 
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <h6><b>Local Anaesthetic</b></h6>
                            <div class="pac-box">
                                <div class="pacu-1"><p>Ropivacaine</p></div>
                                <div class="pacu-1-x">
                                    <select class="form-control" name="ropivacaine">
                                        <option value=''>Select</option>
                                        <option>Without Adrenaline</option>
                                        <option>With Adrenaline</option>
                                    </select>
                                </div>
                                <div class="pacu-1" id="id">
                                    <input type="number" class="form-control" name="ropi_per" id="ropi_per"><span style="padding-top:5px;">%</span>
                                </div>
                                <div class="pacu-1" id="id">
                                    <input type="number" class="form-control" name="ropi_ml" id="ropi_ml"><span style="padding-top:5px;">ml</span>
                                </div>
                                <div class="pacu-1" id="id">
                                    <input type="text" class="form-control" name="ropi_mg" id="ropi_mg"><span style="padding-top:5px;">mg</span>
                                </div>
                            </div><!--pac-box-->
                            <div class="pac-box">
                                <div class="pacu-1"><p>Bupivacaine</p></div>
                                <div class="pacu-1-x">
                                    <select class="form-control" name="bupivacaine">
                                        <option value=''>Select</option>
                                        <option>Without Adrenaline</option>
                                        <option>With Adrenaline</option>
                                    </select>
                                </div>
                                <div class="pacu-1" id="id">
                                    <input type="number" class="form-control" name="bupi_per" id="bupi_per"><span style="padding-top:5px;">%</span>
                                </div>
                                <div class="pacu-1" id="id">
                                    <input type="number" class="form-control" name="bupi_ml" id="bupi_ml"><span style="padding-top:5px;">ml</span>
                                </div>
                                <div class="pacu-1" id="id">
                                    <input type="text" class="form-control" name="bupi_mg" id="bupi_mg"><span style="padding-top:5px;">mg</span>
                                </div>
                            </div><!--pac-box-->
                            <div class="pac-box">
                                <div class="pacu-1"><p>Levobupivacaine</p></div>
                                <div class="pacu-1-x">
                                    <select class="form-control" name="levobupivacaine">
                                        <option value=''>Select</option>
                                        <option>Without Adrenaline</option>
                                        <option>With Adrenaline</option>
                                    </select>
                                </div>
                                <div class="pacu-1" id="id">
                                    <input type="number" class="form-control" name="levo_per" id="levo_per"><span style="padding-top:5px;">%</span>
                                </div>
                                <div class="pacu-1" id="id">
                                    <input type="number" class="form-control" name="levo_ml" id="levo_ml"><span style="padding-top:5px;">ml</span>
                                </div>
                                <div class="pacu-1" id="id">
                                    <input type="text" class="form-control" name="levo_mg" id="levo_mg"><span style="padding-top:5px;">mg</span>
                                </div>
                            </div><!--pac-box-->
                            <div class="pac-box">
                                <div class="pacu-1"><p>Lignocaine</p></div>
                                <div class="pacu-1-x">
                                    <select class="form-control" name="Lignocaine">
                                        <option value=''>Select</option>
                                        <option>Without Adrenaline</option>
                                        <option>With Adrenaline</option>
                                    </select>
                                </div>
                                <div class="pacu-1" id="id">
                                    <input type="number" class="form-control" name="ligno_per" id="ligno_per"><span style="padding-top:5px;">%</span>
                                </div>
                                <div class="pacu-1" id="id">
                                    <input type="number" class="form-control" name="ligno_ml" id="ligno_ml"><span style="padding-top:5px;">ml</span>
                                </div>
                                <div class="pacu-1" id="id">
                                    <input type="text" class="form-control" name="ligno_mg" id="ligno_mg"><span style="padding-top:5px;">mg</span>
                                </div>
                            </div><!--pac-box-->
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="la_repeat">
                                    <input type="checkbox" class="form-check-input" id="rep" value="Yes" name="la_repeat" onclick="repeat()">Repeat Block
                                    <div class="tooltip-14">
                                       <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <div class="right-14">
                                            <div class="text-content-14">
                                                <h6>Local Anasthetic solution(%) & volume(ml)-Ropivacaine,Bupivacaine,Levobupivacaine,Lignocaine plain,Lignocaine with or without adrenaline.</h6>
                                                <i></i>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div><!--row-->
                    <div class="repeat">
                        <div class="row pt">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <div class="pac-box">
                                    <div class="pacu-1"><p>Ropivacaine</p></div>
                                    <div class="pacu-1-x">
                                        <select class="form-control" name="repeat_ropi">
                                            <option>Select</option>
                                            <option>Without Adrenaline</option>
                                            <option>With Adrenaline</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="repropi_per" id="repropi_per"><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="repropi_ml" id="repropi_ml"><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control" name="repropi_mg" id="repropi_mg"><span style="padding-top:5px;">mg</span>
                                    </div>
                                </div><!--pac-box-->
                                <div class="pac-box">
                                    <div class="pacu-1"><p>Bupivacaine</p></div>
                                    <div class="pacu-1-x">
                                        <select class="form-control" name="repeat_bupi">
                                            <option>Select</option>
                                            <option>Without Adrenaline</option>
                                            <option>With Adrenaline</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="repbupi_per" id="repbupi_per"><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="repbupi_ml" id="repbupi_ml"><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control" name="repbupi_mg" id="repbupi_mg"><span style="padding-top:5px;">mg</span>
                                    </div>
                                </div><!--pac-box-->
                                <div class="pac-box">
                                    <div class="pacu-1"><p>Levobupivacaine</p></div>
                                    <div class="pacu-1-x">
                                        <select class="form-control" name="repeat_levo">
                                            <option>Select</option>
                                            <option>Without Adrenaline</option>
                                            <option>With Adrenaline</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="replevo_per" id="replevo_per"><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="replevo_ml" id="replevo_ml"><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control" name="replevo_mg" id="replevo_mg"><span style="padding-top:5px;">mg</span>
                                    </div>
                                </div><!--pac-box-->
                                <div class="pac-box">
                                    <div class="pacu-1"><p>Lignocaine</p></div>
                                    <div class="pacu-1-x">
                                        <select class="form-control" name="repeat_ligno">
                                            <option>Select</option>
                                            <option>Without Adrenaline</option>
                                            <option>With Adrenaline</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="repligno_per" id="repligno_per"><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="repligno_ml" id="repligno_ml"><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control" name="repligno_mg" id="repligno_mg"><span style="padding-top:5px;">mg</span>
                                    </div>
                                </div><!--pac-box-->
                            </div>
                        </div><!--row-->
                    </div><!--repeat ends-->
                </div><!--drop ends-->
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="othered">
                                <input type="checkbox" class="form-check-input" id="oth" value="Yes" name="othered" onclick="other()">Other
                               <div class="tooltip-15">
                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <div class="right-15">
                                        <div class="text-content-15">
                                            <h6>All dosages must be entered in milligram equvivalent only</h6>
                                            <i></i>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="other">
                            <div class="row" style="padding-top:15px;">
                                <div class="col-sm-12" id="id">
                                    <label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control" name="other_name[]">&nbsp;&nbsp;
                                    <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="number" class="form-control" name="other_dose[]">&nbsp;&nbsp;
                                    <button type="button" class="btn add6"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                                <!-- <div class="col-sm-3">
                                    <label >Name</label>
                                </div>
                                <div class="col-sm-3">
                                   <input type="text" class="form-control" name="other_name[]"> 
                                </div>
                                <div class="col-sm-3">
                                     <label >Dosage</label>
                                </div>
                                <div class="col-sm-3" id="id">
                                    <input type="number" class="form-control" name="other_dose[]">
                                      <button type="button" class="btn add6"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div> -->
                            </div>
                        </div><!--other ends-->
                    </div>
                </div><!--row-->
            </div><!--analgesia ends-->
            <h6><b>Vasopressor Use in Recovery</b></h6>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <div class= "box_1">
                        <input type="hidden" class="switch_1" value="No" name="vasopressor">
                        <input type="checkbox" class="switch_1" value="Yes" name="vasopressor">
                    </div>
                </div>
                <div class="col-sm-8"></div>
            </div>
            <div class="row">
                <div class="col-sm-7"></div>
                <div class="col-sm-5">
                    <button type="submit" class="btn-save">Save</button>
                    <button type="button" class="btn-close">Reset</button>
                </div>
            </div><!--row-->
        </form>
    </section><!--add-pacu-->
</div><!---Tab-5--->
<script type="text/javascript">
$(document).ready(function(){
    $('.analgesia').hide();
    $('.intra').hide();
    $('.oral').hide();
    $('.tramadol').hide();
    $('.nsa').hide();
    $('.para').hide();
    $('.regi').hide();
    $('.drop').hide();
    $('.repeat').hide();
    $('.other').hide();
});
$(document).ready(function(){
    var i=1;
    var j=1;
    var k=1;
    var l=1;
    var m=1;
    var n=1;
	$(".add1").click(function(){
        if(i<3){
            // alert(i);
            i++;
		    $(".intra").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name</label><input type="text" class="form-control" name="intra_name[]">&nbsp&nbsp<label >Dosage</label><input type="number" class="form-control" name="intra_dose[]">&nbsp&nbsp<button type="button" class="btn remove1"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add2").click(function(){
        if(j<3){
            j++;
		    $(".oral").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name</label><input type="text" class="form-control" name="oral_name[]">&nbsp&nbsp<label >Dosage</label><input type="number" class="form-control" name="oral_dose[]">&nbsp&nbsp<button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add3").click(function(){
        if(k<3){
            k++;
		    $(".tramadol").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name</label><input type="text" class="form-control" name="tram_name[]">&nbsp&nbsp<label >Dosage</label><input type="number" class="form-control" name="tram_dose[]">&nbsp&nbsp<button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add4").click(function(){
        if(l<3){
            l++;
		    $(".nsa").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name</label><input type="text" class="form-control" name="nsa_name[]">&nbsp&nbsp<label >Dosage</label><input type="number" class="form-control" name="nsa_dose[]">&nbsp&nbsp<button type="button" class="btn remove4"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add5").click(function(){
        if(m<3){
            m++;
		    $(".para").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name</label><input type="text" class="form-control" name="para_name[]">&nbsp&nbsp<label >Dosage</label><input type="number" class="form-control" name="para_dose[]">&nbsp&nbsp<button type="button" class="btn remove5"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add6").click(function(){
        if(n<3){
            n++;
		    $(".other").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name</label><input type="text" class="form-control" name="other_name[]">&nbsp&nbsp<label >Dosage</label><input type="number" class="form-control" name="other_dose[]">&nbsp&nbsp<button type="button" class="btn remove6"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });

    $(document).on('click','.remove1',function(){
        i--;
        // alert(i);
        $(this).closest('.row').remove();
    });
    $(document).on('click','.remove2',function(){
        j--;
        $(this).closest('.row').remove();
    });
    $(document).on('click','.remove3',function(){
        k--;
        $(this).closest('.row').remove();
    });
    $(document).on('click','.remove4',function(){
        l--;
        $(this).closest('.row').remove();
    });
    $(document).on('click','.remove5',function(){
        m--;
        $(this).closest('.row').remove();
    });
    $(document).on('click','.remove6',function(){
        n--;
        $(this).closest('.row').remove();
    });
});	 
</script>
<script type="text/javascript">
function recov(){
    var reco = $('#reco').is(':checked');
    if(!reco){
        $('.analgesia').hide();
    }
    else{
        $(".analgesia").show();
    }
}
function intra(){
    var opi = $('#opi').is(':checked');
    if(!opi){
        $('.intra').hide();
    }
    else{
        $(".intra").show();
    }
}
function oral(){
    var ora = $('#ora').is(':checked');
    if(!ora){
        $('.oral').hide();
    }
    else{
        $(".oral").show();
    }
}
function tramadol(){
    var tra = $('#tra').is(':checked');
    if(!tra){
        $('.tramadol').hide();
    }
    else{
        $(".tramadol").show();
    }
}
function nsa(){
    var nid = $('#nid').is(':checked');
    if(!nid){
        $('.nsa').hide();
    }
    else{
        $(".nsa").show();
    }
}
function para(){
    var temo = $('#temo').is(':checked');
    if(!temo){
        $('.para').hide();
    }
    else{
        $(".para").show();
    }
}
function regi(){
    var reg = $('#reg').is(':checked');
    if(!reg){
        $('.regi').hide();
        $(".drop").hide();
    }
    else{
        $(".regi").show();
    }
}
function drop(){
    var dro = $('#dro').val();
    if(dro != ''){
        $('.drop').show();
    }
    else{
        $(".drop").hide();
    }
}
function repeat(){
    var rep = $('#rep').is(':checked');
    if(!rep){
        $('.repeat').hide();
    }
    else{
        $(".repeat").show();
    }
}
function other(){
    var oth = $('#oth').is(':checked');
    if(!oth){
        $('.other').hide();
    }
    else{
        $(".other").show();
    }
}
$('#ropi_per').keyup(function(){
    var r_per = $('#ropi_per').val();
    var r_ml = $('#ropi_ml').val();
    var aa = (r_per)/100;
    var bb = (r_ml)*10;
    var cc =(aa*bb);
    $('#ropi_mg').val(cc);
});
$('#ropi_ml').keyup(function(){
    var r_per = $('#ropi_per').val();
    var r_ml = $('#ropi_ml').val();
    var aa = (r_per)/100;
    var bb = (r_ml)*10;
    var cc =(aa*bb);
    $('#ropi_mg').val(cc);
});
$('#bupi_per').keyup(function(){
    var b_per = $('#bupi_per').val();
    var b_ml = $('#bupi_ml').val();
    var dd = (b_per)/100;
    var ee = (b_ml)*10;
    var ff =(dd*ee);
    $('#bupi_mg').val(ff);
});
$('#bupi_ml').keyup(function(){
    var b_per = $('#bupi_per').val();
    var b_ml = $('#bupi_ml').val();
    var dd = (b_per)/100;
    var ee = (b_ml)*10;
    var ff =(dd*ee);
    $('#bupi_mg').val(ff);
});
$('#levo_per').keyup(function(){
    var l_per = $('#levo_per').val();
    var l_ml = $('#levo_ml').val();
    var gg = (l_per)/100;
    var hh = (l_ml)*10;
    var ii =(gg*hh);
    $('#levo_mg').val(ii);
});
$('#levo_ml').keyup(function(){
    var l_per = $('#levo_per').val();
    var l_ml = $('#levo_ml').val();
    var gg = (l_per)/100;
    var hh = (l_ml)*10;
    var ii =(gg*hh);
    $('#levo_mg').val(ii);
});
$('#ligno_per').keyup(function(){
    var li_per = $('#ligno_per').val();
    var li_ml = $('#ligno_ml').val();
    var jj = (li_per)/100;
    var kk = (li_ml)*10;
    var ll =(jj*kk);
    $('#ligno_mg').val(ll);
});
$('#ligno_ml').keyup(function(){
    var li_per = $('#ligno_per').val();
    var li_ml = $('#ligno_ml').val();
    var jj = (li_per)/100;
    var kk = (li_ml)*10;
    var ll =(jj*kk);
    $('#ligno_mg').val(ll);
});
$('#repropi_per').keyup(function(){
    var r_per = $('#repropi_per').val();
    var r_ml = $('#repropi_ml').val();
    var aa = (r_per)/100;
    var bb = (r_ml)*10;
    var cc =(aa*bb);
    $('#repropi_mg').val(cc);
});
$('#repropi_ml').keyup(function(){
    var r_per = $('#repropi_per').val();
    var r_ml = $('#repropi_ml').val();
    var aa = (r_per)/100;
    var bb = (r_ml)*10;
    var cc =(aa*bb);
    $('#repropi_mg').val(cc);
});
$('#repbupi_per').keyup(function(){
    var b_per = $('#repbupi_per').val();
    var b_ml = $('#repbupi_ml').val();
    var dd = (b_per)/100;
    var ee = (b_ml)*10;
    var ff =(dd*ee);
    $('#repbupi_mg').val(ff);
});
$('#repbupi_ml').keyup(function(){
    var b_per = $('#repbupi_per').val();
    var b_ml = $('#repbupi_ml').val();
    var dd = (b_per)/100;
    var ee = (b_ml)*10;
    var ff =(dd*ee);
    $('#repbupi_mg').val(ff);
});
$('#replevo_per').keyup(function(){
    var l_per = $('#replevo_per').val();
    var l_ml = $('#replevo_ml').val();
    var gg = (l_per)/100;
    var hh = (l_ml)*10;
    var ii =(gg*hh);
    $('#replevo_mg').val(ii);
});
$('#replevo_ml').keyup(function(){
    var l_per = $('#replevo_per').val();
    var l_ml = $('#replevo_ml').val();
    var gg = (l_per)/100;
    var hh = (l_ml)*10;
    var ii =(gg*hh);
    $('#replevo_mg').val(ii);
});
$('#repligno_per').keyup(function(){
    var li_per = $('#repligno_per').val();
    var li_ml = $('#repligno_ml').val();
    var jj = (li_per)/100;
    var kk = (li_ml)*10;
    var ll =(jj*kk);
    $('#repligno_mg').val(ll);
});
$('#repligno_ml').keyup(function(){
    var li_per = $('#repligno_per').val();
    var li_ml = $('#repligno_ml').val();
    var jj = (li_per)/100;
    var kk = (li_ml)*10;
    var ll =(jj*kk);
    $('#repligno_mg').val(ll);
});
$(document).ready(function(){
    $('#add-pacu').submit(function(e){
		e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type : "POST",
            url : '<?php  echo base_url("Pacu/add_postop")?>',
            data : formData,
            contentType: false,
            processData: false,
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){
                    toastr["success"](response.message);
                    $('#add-pacu')[0].reset();  
                    window.location = '<?php echo base_url("PacuDetails")?>?id='+response.msg;      
                }
                else
                    toastr["error"](response.message);
            }
        });
    });
});
</script>
<?php
    echo view('includes/footer');    
?>
