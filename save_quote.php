<?php
header('Content-Type: application/json');
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $layout = $_POST['layout'] ?? '';
    $core_material = $_POST['core_material'] ?? '';
    $surface_finish = $_POST['surface_finish'] ?? '';
    $measurement_unit = $_POST['measurement_unit'] ?? '';
    $rate_per_unit = $_POST['rate_per_unit'] ?? '';
    $calculated_total_price = $_POST['calculated_total_price'] ?? '';
    $client_name = $_POST['client_name'] ?? '';
    $client_email = $_POST['client_email'] ?? '';
    $client_phone = $_POST['client_phone'] ?? '';
    $client_area = $_POST['client_area'] ?? '';
    $client_message = $_POST['client_message'] ?? '';
    $dynamic_dimensions_json = $_POST['dynamic_dimensions_json'] ?? '';

    // Decode json payload to retrieve extra item title accurately
    $jsonDecoded = json_decode($dynamic_dimensions_json, true);
    $extra_item_name = isset($jsonDecoded['extra_item_name']) ? $jsonDecoded['extra_item_name'] : '';

    $stmt = $conn->prepare("INSERT INTO quotation_requests (layout, extra_item_name, core_material, surface_finish, measurement_unit, rate_per_unit, calculated_total_price, client_name, client_email, client_phone, client_area, client_message, dynamic_dimensions_json) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("sssssssssssss", 
        $layout, 
        $extra_item_name, 
        $core_material, 
        $surface_finish, 
        $measurement_unit, 
        $rate_per_unit, 
        $calculated_total_price, 
        $client_name, 
        $client_email, 
        $client_phone, 
        $client_area, 
        $client_message, 
        $dynamic_dimensions_json
    );

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Data saved successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database Insertion Error']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid Request']);
}
?>