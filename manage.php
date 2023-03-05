<?php
require_once(__DIR__ . '../../../config.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/messagep/manage.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('إدارة الرسائل');


$messages = $DB->get_records('local_messagep_message');

echo $OUTPUT->header();

echo 'بسم الله الرحمن الرحيم'.'<br>';

// $head1 = get_string('head1', 'local_messagep');
// echo "<h1>$head1</h1>";

$templatecontext = [
    'head1' => get_string('head1', 'local_messagep'),
    'messages' => array_values($messages),
    'editurl' => $CFG->wwwroot.'/local/messagep/edit.php'
];

// print_r($messages);exit;
echo $OUTPUT->render_from_template('local_messagep/manage', $templatecontext);

echo $OUTPUT->footer();