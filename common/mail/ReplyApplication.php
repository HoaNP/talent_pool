<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Hello <?= $user->username ?>,


Thank you for your interest in BLANK company. We appreciate the opportunity to review your resume for the position of BLANK job in BLANK city as posted on our website.

We are fortunate to receive many resumes for candidates with a variety of qualifications and take the time to review each resume carefully as to select the strongest candidates. Your resume has been forwarded to the appropriate hiring manager for review. If your background and experience is a fit with the requirements of the position, you will be contacted for an interview.

We will maintain a copy of your resume on file for the period of one year in the event a suitable opportunity should arise. Best wishes in your job search, and thank you again for your interest in our website.

<?= $resetLink ?>

