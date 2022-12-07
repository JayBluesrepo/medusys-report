<?php
    echo view('includes/header',$patient, $feed, $feedcheck, $preo, $posto, $follo, $proccheck, $ecocheck, $focus);    
?>
<section>
    <div role="tabpanel" class="tab-pane" >
        <form id="save-feedback">
            <h3 style="text-align:center; color:blue;">Add Feedback Manually</h3>
            <div class="feed-card">
                <div class="card-header">
                    <h4>1.During or after the procedure,did you experience (rate the severity)</h4>
                </div>
                <div class="card-body">
                    <ul>
                        <li id="first-case"><b>a) Drowsiness</b></li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check1">
                                <input type="radio" class="form-check-input" id="check1" name="option1" value="No" >No
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check2">
                                <input type="radio" class="form-check-input" id="check2" name="option1" value="Mild" >Mild
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check3">
                                <input type="radio" class="form-check-input" id="check3" name="option1" value="Moderate" >Moderate
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check4">
                                <input type="radio" class="form-check-input" id="check4" name="option1" value="Severe" >Severe
                                </label>
                            </div><!--form-check-->
                        </li>
                    </ul><!--ul-->
                    <ul>
                        <li id="first-case"><b>b) Pain at the Site of Surgery</b></li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check5">
                                <input type="radio" class="form-check-input" id="check5" name="option2" value="No" >No
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check6">
                                <input type="radio" class="form-check-input" id="check6" name="option2" value="Mild" >Mild
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check7">
                                <input type="radio" class="form-check-input" id="check7" name="option2" value="Moderate" >Moderate
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check8">
                                <input type="radio" class="form-check-input" id="check8" name="option2" value="Severe" >Severe
                                </label>
                            </div><!--form-check-->
                        </li>
                    </ul><!--ul-->
                    <ul>
                        <li id="first-case"><b>c) Thirst</b></li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check9">
                                <input type="radio" class="form-check-input" id="check9" name="option3" value="No" >No
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check10">
                                <input type="radio" class="form-check-input" id="check10" name="option3" value="Mild" >Mild
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check11">
                                <input type="radio" class="form-check-input" id="check11" name="option3" value="Moderate" >Moderate
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check12">
                                <input type="radio" class="form-check-input" id="check12" name="option3" value="Severe" >Severe
                                </label>
                            </div><!--form-check-->
                        </li>
                    </ul><!--ul-->
                    <ul>
                        <li id="first-case"><b>d) Hoarseness</b></li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check13">
                                <input type="radio" class="form-check-input" id="check13" name="option4" value="No" >No
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check14">
                                <input type="radio" class="form-check-input" id="check14" name="option4" value="Mild" >Mild
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check15">
                                <input type="radio" class="form-check-input" id="check15" name="option4" value="Moderate" >Moderate
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check16">
                                <input type="radio" class="form-check-input" id="check16" name="option4" value="Severe" >Severe
                                </label>
                            </div><!--form-check-->
                        </li>
                    </ul><!--ul-->
                    <ul>
                        <li id="first-case"><b>e)Sore Throat</b></li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check17">
                                <input type="radio" class="form-check-input" id="check17" name="option5" value="No" >No
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check18">
                                <input type="radio" class="form-check-input" id="check18" name="option5" value="Mild" >Mild
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check19">
                                <input type="radio" class="form-check-input" id="check19" name="option5" value="Moderate" >Moderate
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check20">
                                <input type="radio" class="form-check-input" id="check20" name="option5" value="Severe" >Severe
                                </label>
                            </div><!--form-check-->
                        </li>
                    </ul><!--ul-->
                    <ul>
                        <li id="first-case"><b>f) Nausea or vomiting</b></li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check21">
                                <input type="radio" class="form-check-input" id="check21" name="option6" value="No" >No
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check22">
                                <input type="radio" class="form-check-input" id="check22" name="option6" value="Mild" >Mild
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check23">
                                <input type="radio" class="form-check-input" id="check23" name="option6" value="Moderate" >Moderate
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check24">
                                <input type="radio" class="form-check-input" id="check24" name="option6" value="Severe" >Severe
                                </label>
                            </div><!--form-check-->
                        </li>
                    </ul><!--ul-->
                    <ul>
                        <li id="first-case"><b>g) Feeling Cold</b></li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check25">
                                <input type="radio" class="form-check-input" id="check25" name="option7" value="No" >No
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check26">
                                <input type="radio" class="form-check-input" id="check26" name="option7" value="Mild" >Mild
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check27">
                                <input type="radio" class="form-check-input" id="check27" name="option7" value="Moderate" >Moderate
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check28">
                                <input type="radio" class="form-check-input" id="check28" name="option7" value="Severe" >Severe
                                </label>
                            </div><!--form-check-->
                        </li>
                    </ul><!--ul-->
                    <ul>
                        <li id="first-case"><b>h) Confusion or disorientation</b></li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check29">
                                <input type="radio" class="form-check-input" id="check29" name="option8" value="No" >No
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check30">
                                <input type="radio" class="form-check-input" id="check30" name="option8" value="Mild" >Mild
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check31">
                                <input type="radio" class="form-check-input" id="check31" name="option8" value="Moderate" >Moderate
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check32">
                                <input type="radio" class="form-check-input" id="check32" name="option8" value="Severe" >Severe
                                </label>
                            </div><!--form-check-->
                        </li>
                    </ul><!--ul-->
                    <ul>
                        <li id="first-case"><b>i) Backpain(pain at the site of the anaesthetic injection)</b></li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check33">
                                <input type="radio" class="form-check-input" id="check33" name="option9" value="No" >No
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check34">
                                <input type="radio" class="form-check-input" id="check34" name="option9" value="Mild" >Mild
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check35">
                                <input type="radio" class="form-check-input" id="check35" name="option9" value="Moderate" >Moderate
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check36">
                                <input type="radio" class="form-check-input" id="check36" name="option9" value="Severe" >Severe
                                </label>
                            </div><!--form-check-->
                        </li>
                    </ul><!--ul-->
                    <ul>
                        <li id="first-case"><b>j) Shivering</b></li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check37">
                                <input type="radio" class="form-check-input" id="check37" name="option10" value="No" >No
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check38">
                                <input type="radio" class="form-check-input" id="check38" name="option10" value="Mild" >Mild
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check39">
                                <input type="radio" class="form-check-input" id="check39" name="option10" value="Moderate" >Moderate
                                </label>
                            </div><!--form-check-->
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label" for="check40">
                                <input type="radio" class="form-check-input" id="check40" name="option10" value="Severe" >Severe
                                </label>
                            </div><!--form-check-->
                        </li>
                    </ul><!--ul-->
                </div>
            </div><!--feed-card-->
            <div class="feed-card">
                <div class="card-header">
                    <h4>Satisfaction with Anaesthesia care</h4>
                </div>
                <div class="card-body">
                    <div class="card-info1">
                        <h6>1).Did you had pain before surgery ?</h6>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8 py-2">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="option11" value="Yes">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="option11" value="No">No
                                    </label>
                                </div>
                            </div>
                        </div><!--row-->
                        <div class="row py-2">
                            <div class="col-sm-6">
                                <span>a)&nbsp;&nbsp; Was your anaesthetist involved in managing your pain before surgery ?</span>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="option12" value="Yes">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="option12" value="No">No
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div><!--row-->
                        <div class="row py-2">
                            <div class="col-sm-6">
                                <span>b)How well was it managed ?</span>
                            </div>
                            <div class="col-sm-8">
                                <ul>
                                    <li>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="option13" value="Very Satisfied">Very Satisfied
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="option13" value="Satisfied">Satisfied
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="option13" value="dissatisfied">dissatisfied
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="option13" value="Very dissatisfied">Very dissatisfied
                                            </label>
                                        </div>
                                    </li>
                                    <li class="pt">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="option13" value="Unable to answer">Unable to answer
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!--row-->
                    </div><!--card-info1-->
                    <div class="card-info1">
                        <h6>2).Did you feel you had time to ask your anaesthetist,questions before your surgery?</h6>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option14" value="Yes">Yes
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option14" value="No">No
                            </label>
                        </div>
                    </div><!--card-info1-->
                    <div class="card-info1">
                        <h6>3).How satisfied were you with the information on Regional anaesthesia provided by your anaesthetist?</h6>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option15" value="Very satisfied">Very satisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option15" value="Satisfied">Satisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option15" value="Dissatisfied">Dissatisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option15" value="Very Dissatisfied">Very Dissatisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option15" value="Unable to Answer">Unable to Answer
                            </label>
                        </div>
                    </div><!--card-info1-->
                    <div class="card-info1">
                        <h6>4).How satisfied were you from anaesthesia ?</h6>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option16" value="Very satisfied">Very satisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option16" value="Satisfied">Satisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option16" value="Dissatisfied">Dissatisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option16" value="Very Dissatisfied">Very Dissatisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option16" value="Unable to Answer">Unable to Answer
                            </label>
                        </div>
                    </div><!--card-info1-->
                    <div class="card-info1">
                        <h6>5).How satisfied have you been with pain theraphy after surgery ?</h6>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option17" value="Very satisfied">Very satisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option17" value="Satisfied">Satisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option17" value="Dissatisfied">Dissatisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option17" value="Very Dissatisfied">Very Dissatisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option17" value="Unable to Answer">Unable to Answer
                            </label>
                        </div>
                    </div><!--card-info1-->
                    <div class="card-info1">
                        <h6>6).How satisfied were you with treatment of nausea and vomiting after the operation?</h6>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option18" value="Very satisfied">Very satisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option18" value="Satisfied">Satisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option18" value="Dissatisfied">Dissatisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option18" value="Very Dissatisfied">Very Dissatisfied
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option18" value="Unable to Answer">Unable to Answer
                            </label>
                        </div>
                    </div><!--card-info1-->
                    <div class="card-info1">
                        <h6>7).To what degree after the operation,did numbness or heaviness of the anaesthetised limb or body part bother you ?</h6>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option19" value="None">None
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option19" value="Mild-Barely noticeable">Mild-Barely noticeable
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option19" value="Moderate:definetly noticeable">Moderate:definetly noticeable
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option19" value="Severe:very pre-occupied by the symptom">Severe:very pre-occupied by the symptom
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option19" value="Unable to Answer">Unable to Answer
                            </label>
                        </div>
                    </div><!--card-info1-->
                    <div class="card-info1">
                        <h6>8).When the numbness/heaviness related to the regional anaesthesia wore off,how much pain did you experience ?</h6>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option20" value="None">None
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option20" value="Mild-Barely noticeable">Mild-Barely noticeable
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option20" value="Moderate Pain">Moderate Pain
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option20" value="Severe Pain">Severe Pain
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option20" value="Unable to Answer">Unable to Answer
                            </label>
                        </div>
                    </div><!--card-info1-->
                    <div class="card-info1">
                        <h6>9).Were you to require a similar operation again,would you be happy to have the same type of a regional anaesthetic again ?</h6>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option21" value="Yes">Yes
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option21" value="No">No
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="option21" value="Unable to Answer">Unable to Answer
                            </label>
                        </div>
                    </div><!--card-info1-->
                    <div class="card-info1">
                        <h6>10).Overall satisfaction score(1:Least satisfied to 10:most satisfied)</h6>
                        <input type="number" class="form-control" name="overall_satisfaction" style="width: 50%;">
                    </div><!--card-info1-->
                    <div class="card-info1">
                        <h6>11).Is there any suggestion you would like to make to improve the quality of anaesthesia care?</h6>
                        <textarea class="form-control" rows="3" name="any_suggestions" style="width:75%;"></textarea>
                    </div><!--card-info1-->
                    <div class="row">
                        <div class="col-sm-9"></div>
                        <div class="col-sm-3"><button type="submit" class="btn-submit">Submit</button></div>
                    </div>
                </div>
            </div><!--feed-card-->
        </form>
    </div><!--feedback-tab-->
</section><!--tab-content-->
<script type="text/javascript">
$(document).ready(function(){
    $('#save-feedback').submit(function(e){
		e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type : "POST",
            url : '<?php  echo base_url("ManualFeedback/add_feed")?>',
            data : formData,
            contentType: false,
            processData: false,
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){
                    toastr["success"](response.message);
                    $('#save-feedback')[0].reset(); 
                    window.location = '<?php echo base_url("FeedbackDetails")?>?id='+response.msg;       
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