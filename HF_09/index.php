<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Please enter user id:<br><br>
    <input type="number" name="id"><br><br>
    <input type="submit" name="submit" value="Submit"><br><br>
</form>
<?php

if (isset($_GET['id'])) {
    $userID = $_GET['id'];
    $user = useCurl("https://fakestoreapi.com/users/" . $userID);
    if ($user != null) {
        $products = useCurl("https://fakestoreapi.com/products");
        $userCarts = useCurl("https://fakestoreapi.com/carts/user/" . $userID);
        totalValueofCart($products, $userCarts, $userID);
    } else {
        echo "User with id " . $userID . " doesn't exists!";
    }
}

function useCurl($url)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    curl_close($curl);

    return json_decode($response, true);
}

function totalValueofCart($products, $userCarts, $userID)
{
    if (count($userCarts) > 0) {
        $totalSum = 0;
        $cartSum = 0;
        foreach ($userCarts as $cart) {
            foreach ($cart['products'] as $productInCart) {
                foreach ($products as $productInStore) {
                    if ($productInCart['productId'] === $productInStore['id']) {
                        $cartSum += $productInStore['price'] * $productInCart['quantity'];
                    }
                }
            }
            if (count($userCarts) > 0) {
                $totalSum += $cartSum;
            }
        }
        if ($totalSum !== 0) {
            echo "Total value of the cart: " . $totalSum . "$";
        }
    } else {
        echo "User with id " . $userID . " has no cart!";
    }
}

?>
