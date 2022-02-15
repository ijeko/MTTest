<pre>
<code>
function getCustomers(string $customer_ids)
{
    $db = mysqli_connect("localhost", "root", "password", "db_name");

    $customer_ids = explode(',', $customer_ids);
    $customer_ids = '(' . implode(',', $customer_ids) . ')';

    $sql = mysqli_query($db, "SELECT id as customer_id, customer_name FROM customers WHERE id IN $customer_ids");
    $data = $sql->fetch_all(MYSQLI_ASSOC);

    mysqli_close($db);

    return $data;
}

//пример строки которая приходит: http://www.site.com/?customer_ids=1,2,3,4,5

$data = getCustomers($_GET['customer_ids']);
foreach ($data as $customer_id => $customer_name) {
    echo "<a href=\"/customer.php?id=$customer_id\">$customer_name</a>";
}
</code>
</pre>
