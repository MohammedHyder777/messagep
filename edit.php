<?php
require_once(__DIR__ . '../../../config.php');
require_once($CFG->dirroot.'/local/messagep/classes/form/edit.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/messagep/edit.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('تحرير الرسائل');

$mform = new editp();



//Form processing and displaying is done here
if ($mform->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
    redirect($CFG->wwwroot.'/local/messagep/manage.php', 'Message editing cancelled');
} else if ($fromform = $mform->get_data()) {
  //In this case you process validated data. $mform->get_data() returns data posted in form.
  $record = new stdClass();
  $record->text = $fromform->message_text;
  $record->type = $fromform->message_type;

  $DB->insert_record('local_messagep_message', $record);

  redirect($CFG->wwwroot.'/local/messagep/manage.php', 'Message with body: <br>'.substr($record->text, 0, 100).'... <br>sent successfullly', $messagetype='success');


} else {
  // this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
  // or on the first display of the form.
}

  echo $OUTPUT->header();
  //displays the form
  $mform->display();

echo $OUTPUT->footer();