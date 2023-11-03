<?php
// Data training
$training_data = [...];
// Data uji
$test_data = ["roni", "3", "ada", "ada", "rendah","sewa"];
// Menghitung jumlah kelas
$class_count = ["Yes" => 0, "No" => 0];
foreach ($training_data as $data) {
    $class_count[$data[4]]++;}
// Menghitung probabilitas kelas
$total_data = count($training_data);
$prob_class = [];
foreach ($class_count as $class => $count) {
    $prob_class[$class] = $count / $total_data;}
// Menghitung probabilitas atribut diberikan kelas
$prob_attr_given_class = [];
$attributes = count($training_data[0]) - 1;
for ($i = 0; $i < $attributes; $i++) {
    $prob_attr_given_class[$i] = [];
    foreach ($training_data as $data) {
        $attr_value = $data[$i];
        $class = $data[$attributes];
        
        if (!isset($prob_attr_given_class[$i][$attr_value])) {
            $prob_attr_given_class[$i][$attr_value] = [];} 
        if (!isset($prob_attr_given_class[$i][$attr_value][$class])) {
            $prob_attr_given_class[$i][$attr_value][$class] = 1;
        } else {
            $prob_attr_given_class[$i][$attr_value][$class]++;}}}
// Menghitung probabilitas prediksi untuk setiap kelas
$prob_pred_class = [];
foreach ($class_count as $class => $count) {
    $prob_pred_class[$class] = $prob_class[$class];
    for ($i = 0; $i < $attributes; $i++) {
        $attr_value = $test_data[$i];
        $prob_pred_class[$class] *= ($prob_attr_given_class[$i][$attr_value][$class] ?? 1) / $count; }}
// Menentukan kelas dengan probabilitas tertinggi sebagai prediksi
$predicted_class = array_search(max($prob_pred_class), $prob_pred_class);

// Output hasil prediksi
echo "Predicted class: " . $predicted_class;
?>
