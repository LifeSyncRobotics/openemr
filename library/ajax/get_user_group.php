<?php
require_once("../../globals.php");
require_once("$srcdir/acl.inc");
session_start();

// Ensure user is authenticated
if (!isset($_SESSION['authUserID'])) {
    echo json_encode(['error' => 'User not authenticated']);
    exit;
}

// Get the authenticated user's ID
$authUserID = $_SESSION['authUserID'];

// Function to get the user's ACL group
function getUserAclGroup($userID) {
    $sql = "SELECT g.name 
            FROM users u
            JOIN groups g ON u.group_id = g.id
            WHERE u.id = ?";
    $result = sqlQuery($sql, array($userID));
    return $result ? $result['name'] : null;
}

// Get the user's ACL group
$aclGroup = getUserAclGroup($authUserID);

// Return the result in JSON format
echo json_encode(['user' => $_SESSION['authUser'], 'group' => $aclGroup]);
?>
