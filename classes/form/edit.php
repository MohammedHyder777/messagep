<?php
//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");

class editp extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;
       
        $mform = $this->_form; // Don't forget the underscore! 

        $mform->addElement('text', 'message_text', 'Message text'); // Add elements to your form.
        $mform->setType('message_text', PARAM_NOTAGS);                   // Set type of element.
        $mform->setDefault('message_text', 'Enter message body');        // Default value.

        $choices = [
            \core\output\notification::NOTIFY_SUCCESS,
            \core\output\notification::NOTIFY_WARNING,
            \core\output\notification::NOTIFY_INFO,
            \core\output\notification::NOTIFY_ERROR,
        ];
        $mform->addElement('select', 'message_type', 'Message Type', $choices);
        $mform->setDefault('message_type', '2');
        $this->add_action_buttons(true, 'Send message');
    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}