<?php
require_once('./class/load.php');

$json = array();


// ================= GOOGLE RECAPTCHA VERIFY =================
if (isset($_POST['g-recaptcha-response'])) {

    $recaptcha = $_POST['g-recaptcha-response'];
    $secret_key = "6LceLSMsAAAAAA1ludhNi9NaG33nUxzielHwWDb0";

    $url = "https://www.google.com/recaptcha/api/siteverify";

    $response = file_get_contents($url . "?secret=" . $secret_key . "&response=" . $recaptcha);
    $responseKeys = json_decode($response, true);

    if (!$responseKeys["success"]) {
        $json['status'] = 101;
        $json['msg'] = "Please verify captcha.";
    }

} else {
    $json['status'] = 101;
    $json['msg'] = "Captcha is required.";
}
/* MESSAGE */
if (isset($_POST['message']) && !empty($action->db->test_input($_POST['message']))) {
    $message = $action->db->test_input($_POST['message']);
} else {
    $json['status'] = 101;
    $json['msg'] = "Message is required.";
}

/* SUBJECT */
if (isset($_POST['subject']) && !empty($action->db->test_input($_POST['subject']))) {
    $subject = $action->db->test_input($_POST['subject']);

    if ($subject == "Blank") {
        if (isset($_POST['other_subject']) && !empty($action->db->test_input($_POST['other_subject']))) {
            $subject = $action->db->test_input($_POST['other_subject']);
        } else {
            $json['status'] = 101;
            $json['msg'] = "State your subject.";
        }
    }

} else {
    $json['status'] = 101;
    $json['msg'] = "Subject is required.";
}

/* EMAIL */
if (isset($_POST['email']) && !empty($action->db->test_input($_POST['email']))) {

    $email = $action->db->test_input($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $json['status'] = 101;
        $json['msg'] = "Invalid email address.";
    }

} else {
    $json['status'] = 101;
    $json['msg'] = "Email is required.";
}

/* PHONE */
if (isset($_POST['phone']) && !empty($action->db->test_input($_POST['phone']))) {

    $phone = $action->db->test_input($_POST['phone']);

    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        $json['status'] = 101;
        $json['msg'] = "Invalid phone number.";
    }

} else {
    $json['status'] = 101;
    $json['msg'] = "Phone number is required.";
}

/* NAME */
if (isset($_POST['name']) && !empty($action->db->test_input($_POST['name']))) {
    $name = $action->db->test_input($_POST['name']);
} else {
    $json['status'] = 101;
    $json['msg'] = "Name is required.";
}


/* INSERT DATA */
if (empty($json)) {

    $fields = [
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "subject" => $subject,
        "message" => $message,
        "date" => date("Y-m-d H:i:s")
    ];

    $insert = $action->db->insert("tbl_contact", $fields);

    if ($insert) {
        $json['status'] = 100;
        $json['msg'] = "We will respond soon.";
    } else {
        $json['status'] = 102;
        $json['msg'] = "Something went wrong.";
    }
}

/* RESPONSE */
echo json_encode($json);
?>