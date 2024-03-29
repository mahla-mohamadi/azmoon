<?php

/*
Template Name: Run
*/
get_header();
$quizID = $_GET['quiz'];
$azmoon_single_test_container = get_field('azmoon_single_test_container', $quizID);
$azmoon_single_test_time = get_field('azmoon_single_test_time', $quizID);
?>

<div class="runQuizPageBack mainView">
    <div>You are running Quiz with ID = <?php echo $quizID; ?></div>
    <div class="timerCountParent"><span id="min"><?php echo is_numeric($azmoon_single_test_time) ? $azmoon_single_test_time : 10; ?></span>:<span id="sec">00</span></div>
    <!-- Custom progress bar using a div -->
    <div class="progress progressBarSetTimeParent">
        <div id="dynamicProgressBarSetTime" class="determinate"></div>
    </div>
    <?php
    // Assuming $azmoon_single_test_container is an array
    $phpData = array();

foreach ($azmoon_single_test_container as $questionIndex => $cont) { ?>
    <div class="questionAnswerContainer">
        <p class="testQuestionTxt"><?php echo $cont['test_question']; ?></p>
        <?php foreach ($cont['test_answers'] as $answerIndex => $ans) { ?>
            <?php
                // Assuming 'score' is a field associated with each answer
                // $score = $ans['score'] ; // Adjust this based on your field structure
                $phpData[] = $questionIndex; // Add the score to the array
                ?>
                <label for="test_<?php echo $questionIndex . '_' . $answerIndex; ?>">
                    <input type="radio" class="myInput" value="<?php echo $ans['score'] ?>" name="test_<?php echo $questionIndex; ?>" id="test_<?php echo $questionIndex . '_' . $answerIndex; ?>" />
                    <span><?php echo $ans['answer']; ?></span>
                </label>
        <?php } ?>
    </div>
<?php } ?>
<button id="performTest">حساب کن</button>
<div class="results"></div>
</div>

</div>


<?php get_footer(); ?>

