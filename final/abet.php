<?php
session_start();
$user_data = JSON_DECODE($_SESSION['user_data']);
$shorthands = [
	'spring' => 'sp',
	'fall'   => 'fa',
];
var_dump($user_data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='abet.css'>
    <title>UTK ABET</title>
</head>
<body>
    <header>
        <h4>UTK ABET</h4>
        <div>
            <figure>
                <!-- Yeah, I know this isn't how svg's shouldn't be displayed. Bite me. -->
                <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="#2074b0" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                </svg> 
                <svg class="bi bi-caret-down-fill" width="0.6em" height="0.6em" viewBox="0 0 16 16" fill="#2074b0" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 01.753 1.659l-4.796 5.48a1 1 0 01-1.506 0z"/>
                </svg>
            </figure>
            <nav>
            </nav>
        </div>
    </header>
    <section class="wrapper">
        <nav class="main-nav">
            <h4>Section:</h4>
            <select name="section" id="sectionMenu">
				<?php
					$ind = 1;
					foreach($user_data as $row){
						echo '<option value="section'.$ind++.'"';
						echo 'data-major="'.$row->major.'"';
						echo 'data-sectionid="'.$row->sectionId.'"';
						echo '>';
						echo $row->courseId.' ';
						echo $row->semester.' ';
						echo $row->year.' ';
						echo $row->major;
						echo '</option>';
					}
				?>
            </select>
        </nav>
        <main>
            <section class="results panel">
                <h2>Results</h2>
                <p class="description">
                    Please enter the number of students who do not meet expectations, meet expectations, and exceed expectations. You can type directly into the boxes--you do not need to use the arrows.
                </p>
                <section class="example">
                    <p> <b>Outcome 2 - CS: </b> Design, implement, and evaluate a computing-based solution to meet a given set of computing requirements in the context of the program's discipline.
                    </p>
                </section>
                <section class="expectations">
                    <div class="labels">
                            <label for="bad">Not Meets Expectations</label>
                            <label for="ok">Meets Expectations</label>
                            <label for="good">Exceeds Expectations</label>
                            <p class="totalValue label">Total</p>
                    </div>
                    <div class="filters">
                        <input type="number" name="bad" id="bad" value="0" min="0">
                        <input type="number" name="ok" id="ok" value="0" min="0">
                        <input type="number" name="good" id="good" value="0" min="0">
                        <p class="totalValue value">0</p>
                        </div>
                    </div>
                    <button class="btn btn--blue" type="submit">Save Results</button>
                </section>
            </section>
            <section class="ass-plan panel">
                <h2>Assessment Plan</h2>
                <ol>
                    <li>Please enter your assessment plan for each outcome. The weights are percentages from 0-100 and the weights should add up to 100%.</li>
                    <li>Always press "Save Assessments" when finished, even if you removed an assessment. The trash can only removes an assessments from this screen-it does not remove it from database until you press "Save Assessments".</li>
                </ol>
                <div class="labels">
                    <p class="weight">Weight (%)</p>
                    <p class="desc">Description</p>
                    <p class="remove">Remove</p>
                </div>
                <div class="inputs">
                    <input type="number" name="weight" id="weight0" class='weight' min="1" max="100">
                    <textarea name="desc" id="desc0" class="desc" cols="30" rows="5" maxlength="400" placeholder="None"></textarea>
                    <div id="remove0" class="remove">
                        <button class="btn btn--red">
                            <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>

                </div>
                <div class="inputs">
                    <input type="number" name="weight" id="weight0" class='weight' min="1" max="100">
                    <textarea name="desc" id="desc0" class="desc" cols="30" rows="5" placeholder="None"></textarea>
                    <div id="remove0" class="remove">
                        <button class="btn btn--red">
                            <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>

                </div>
                <button class="btn btn--green">+ New</button>
                <button class="btn btn--blue">Save Assessments</button>
            </section>
            
            <section class="summary panel">
                <h2>Narrative Summary</h2>
                <p>Please enter your narractive for each outcome, including the student strengths for the outcome, student weaknesses for the outcomes, and suggested actions for improving student attainment of each outcome.</p>
                <p class='label'>Strengths</p>
                <textarea name="strengths" id="strengths" cols="60" rows="10" maxlength="2000" placeholder="None"></textarea>
                <p class='label'>Weaknesses</p>
                <textarea name="weaknesses" id="weaknesses" cols="60" rows="10" maxlength="2000" placeholder="None"></textarea>
                <p class='label'>Actions</p>
                <textarea name="actions" id="actions" cols="60" rows="10" maxlength="2000" placeholder="None"></textarea>
                <button class="btn btn--blue">Save Narrative</button>
            </section>
        </main>
    </section>
    <script src="client.js"></script>
	<script src='outcomes.js'> </script>
	<script src='section.js'> </script>
</body>
</html>
