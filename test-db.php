<?php

// Test database connection and counts
try {
    $config = include 'config/database.php';
    $db = $config['connections'][$config['default']];
    
    $conn = new PDO(
        'mysql:host=' . $db['host'] . ';dbname=' . $db['database'],
        $db['username'],
        $db['password']
    );
    
    echo "✓ Database connected\n\n";
    
    // Check tables
    $tables = ['categories', 'products', 'pages', 'users'];
    foreach ($tables as $table) {
        $stmt = $conn->query("SELECT COUNT(*) as cnt FROM $table");
        $count = $stmt->fetch(PDO::FETCH_ASSOC)['cnt'];
        echo "  - $table: $count records\n";
    }
    
    echo "\n✓ Database check completed\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage();
}
