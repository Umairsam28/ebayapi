<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ebay.com/sell/inventory/v1/bulk_create_or_replace_inventory_item",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n    \"requests\": [\n        {\n            \"sku\": \"TESTB07H5T7QGM\",\n            \"locale\": \"en_CA\",\n            \"product\": {\n                \"title\": \"Old World Christmas RED Rose Ornament, Multi\",\n                \"aspects\": {\n                   \n                },\n                \"description\": \"Old World Christmas RED Rose Ornament, Multi\",\n                \"imageUrls\": [\n                    \"https://m.media-amazon.com/images/I/41kYYKjo7CL.jpg\"\n                ]\n            },\n            \"condition\": \"NEW\",\n            \"availability\": {\n                \"shipToLocationAvailability\": {\n                    \"quantity\": 0\n                }\n            }\n        }\n    ]\n}",
  CURLOPT_HTTPHEADER => array(
    "accept-language: en-US",
    "authorization: Bearer v^1.1#i^1#I^3#r^0#f^0#p^3#t^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Bearer v^1.1#i^1#I^3#r^0#f^0#p^3#t^H4sIAAAAAAAAAOVYa2wUVRTubh+IpSBJQwnBuAzSCGV2Z3ZnZ3YGdpNtu01XaLvulmeE9s7Mnfa281hmZtsuwaQWQaMmgjGAEoX4iNEfJJDIw0TUYIixij80YoAY4iMaYkQiCTGhxZnpg22J0HYx2cT9MZt77nl9555z77mX6C+bvWJ34+4bFa5Z7sP9RL/b5SLLidllpTVzi92LSouIHAbX4f5H+0sGin9bbQBFTnNJaKQ11YCePkVWDc4hhrGMrnIaMJDBqUCBBmcKXCratJbzewkurWumJmgy5onXh7EASVMMlChGkASBhaRFVcd0tmphjAICLQV4huQlAQZFypo3jAyMq4YJVDOM+Qk/iRMUTrCtBMORDEeRXjrAbMY866FuIE21WLwEFnHc5RxZPcfXu7sKDAPqpqUEi8SjDamWaLw+1ty62pejKzIah5QJzIwxcVSnidCzHsgZeHczhsPNpTKCAA0D80VGLExUykXHnJmB+06o+UDIT4lCiA4xPMMQofsSygZNV4B5dz9sChJxyWHloGoiM3uviFrR4LugYI6Omi0V8XqP/fdEBshIQlAPY7Ha6KZ1qVgS86QSCV3rQSIUbaRk0M8yNMmSASwCFNRjmczo0AhSo4ZGtI2GeZKlOk0VkR00w9OsmbXQ8hpOjg2RExuLqUVt0aOSaXuUy8eOx9C/2V7UkVXMmJ2qva5QsbzyOMN7r8BYStxOgvuVFCLFQ5EOSjzPBiSGCNyRFHatzyAxIvbaRBMJn+0L5EEWV4DeDc20DASIC1Z4MwrUkcgFgpI/EJIgLtKshFOsJOF8UKRxUoKQgJDnBTb0f8oP09QRnzHheI5MnnBAhrGUoKVhQpORkMUmszh7zmhG9BlhrNM005zP19vb6+0NeDW9w+cnCNK3sWltSuiECsDGedG9mXHk5IYALSkDcWY2bXnTZ6WeZVztwCIBXUwA3cymoCxbhLHEneBbZDL1X0DWyciKQKtlorAwNmqGCcW8oMlaB1KboNmpiQWDza51B59dNPH6vPBF0+m4omRMwMswXjgQHXh+lmaDdF7w7C2NQ0DiTK0bqoWXoclYQzKWamxrbVkTa84LaQoKOjQLC10D27N9W1dfk5rtbagjQ0yjRPcASJEyS6fWsGpNVuiiyGw3v/3xWDgv8E0dqNBylwgyQYKgWPuTBza71keqtMAAxvQOq29u1fEGYJhNUER4IlmP01AMstYdAOBsSLI7FT6vdTXs07OwcNvyhqUApJHX3l28gqb4NGA1iDapzfHYMxUmn2GdvN6RdsvS7NUhEDVVzs5EeBoySLX7KE3PzsTguPA0ZIAgaBnVnIm5UdFpSEgZWUKybDdkMzGYIz4dN1UgZ00kGDMyiVQ72wxLxK71qYqlQdYBKSIjbdfLlAxaNKubF6DX6rCd6924w3lVqW5Vv2613m0ZHRVWsY5sUm2tOhCtcRs+adPC9W2dnaaioL688NtRLrAW0UGfiKZSG1qS+TWI9bCn0I6eIM2HghQt4JJfEnAqGCRxQNI0LvoJkWEYAQZgPkduGEPgP2+kSp4+OD3QJE0yoVCIJP1ThTaJkHNTveORwjfxlTBS5PzIAdcHxIDrqNvlInzEMnIpsaSseF1J8ZxFBjKtTQRIXgN1qMC+lXu7YTYNkO4uc/VWffjORznvkoe3EAvHXyZnF5PlOc+UxOLbM6XkvKoKP0lQBEswJEORm4mlt2dLyAUlleeu7empHvr9h8cOXf/lmfqTlVdWuiFRMc7kcpUWlQy4iiqOVX13bS6VUtovYhd/2itzaluZcPP7V7rnfPzgsuC5uucPVM76+8357cKq/vN9g9jLO7Ivua8++8DJv5a4VxCr99Vd2FU+sC65d+cL0afKa5uSGysjry9/sv1a9dxdDadfXf6e90yz98+Vu75cHH74yHNtjXvLwp63bp45lQrtSJwd3CTsR5FL6o55rzWevCV+e/zs3LdPfEWfPrOletBz5Rbzx/D7C/Wj2Ll27+VLP2vDz1YdGazbeQDcujq0YOvxPZ+7As01+13xJfMXfVabfvGNh4Qbi7tO7Nt4KDGnM/bN+S9q0zXg1CPepq+VrcPXQxuUY+9exobW/xhdVXFwaeWvQ9XJC6c//WR4/sjy/QOXaQkRMRYAAA==",
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 7efac3a7-4eda-ef38-5b4c-a63ee5e6fa97"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}