<?php

$curl = curl_init();
 //"https://api.ebay.com/sell/inventory/v1/offer/{offer_id}/publish"
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ebay.com/sell/inventory/v1/offer/107931373010/publish",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "accept-language: en-US",
    "authorization: Bearer v^1.1#i^1#f^0#I^3#p^3#r^0#t^H4sIAAAAAAAAAOVYfWwTZRhf96ULDhJ1Gy5KyiEi4LV3117bu6zVsnVZ3VdZCwgJqW/v3luPXe+6u7fbiokZi0Gd4Q8liqjoMEwxUYgYYxSVPwQEwz/ESAIJxgh+JBJEhxjFr/duH3QjwrZi0sT+cc37vM/X73mf532f96X6yyuWbW7a/Gul7abioX6qv9hmo+dQFeVly+eWFNeWFVE5DLah/rv7SwdKvq8zQEpJ8x3QSGuqAe19KUU1eIvoJzK6ymvAkA1eBSlo8Ejgo8HWFp5xUHxa15AmaAphDzf4CSiyIu31ci6Xi3Z7fCymquM6Y5qf8EKaYwWfyAEWel0uiOcNIwPDqoGAivwEQzE0SblJiovRNM/4eJfbwTLedYR9NdQNWVMxi4MiApa7vCWr5/h6bVeBYUAdYSVEIBxsjLYHww2htlidM0dXYCwOUQRQxpg8qtdEaF8NlAy8thnD4uajGUGAhkE4A6MWJivlg+POzMJ9K9QM9DIQJhiREeiEj3PfkFA2anoKoGv7YVJkkZQsVh6qSEbZ60UURyOxAQpobNSGVYQb7ObfygxQZEmGup8IrQiuXRUNdRD2aCSiaz2yCEUTKc0ynNdDc7SLCICU3INNZnRosO4xQ6PaxsI8xVK9poqyGTTD3qahFRB7DafGhs6JDWZqV9v1oIRMj3L5XBMxpNaZizq6ihmUVM11hSnsld0aXn8FxlPiShLcqKTwipLEJUTokrw+1iN4r0oKs9ZnkRgBc22CkYjT9AUmQJZMAb0LorQCBEgKOLyZFNRlkXexEuPySZAUPZxEujlJIhOs6CFpCUIKp2tC4Hz/p/xASJcTGQQncmTqhAXST0QFLQ0jmiILWWIqi7XnjGVEn+Enkgileaezt7fX0etyaHqnk6Eo2vlQa0tUSMIUICZ45eszk7KVGwLeijE/j7Jp7E0fTj1sXO0kAi5djAAdZaNQUTBhPHEn+RaYSv0XkPWKjCMQwyYKC2OTZiAo5gVN0TpltRWipCYWDDaz1i18ZtGEG/LCF0ynw6lUBoGEAsOFA9GCx3AejvXkBc/c0ngZSDzSuqBaeBnaEWrsCEWb4rH25lBbXkijUNAhKix0jVzPxu4Nfa1qtrexnvZ5myRPD4BuWuE80WZOXZ4VNrjpbFdi44Mhf17gWzvlQstdivWyFOXmzE8e2MxaH63SAgMY0jtx3xzTyUZgoFYoymSko4H04IsCl5AEQHI+CTcrVCKvdTXM07OwcJvyBlYA0rLD3F0cgpZyagA3iCYpbnlsnw6T08Anr2O03cKaHToEoqYq2dkIz0BGVs0+StOzszE4ITwDGSAIWkZFszE3JjoDCSmjSLKimA3ZbAzmiM/ETRUoWSQLxqxMyqqZbQYWMWt9umJpkLVAirKRNutlWgYxDXfzAnTgDtu63k04nFeV6rj6ddx6xzO6XFjFOrpJxWM6EPE4Tk7ZtEi9O5lEqZTclxd+M8oF1iJa6CPBaHRNe0d+DWID7Cm0o4f1JHys2yOQEiMJpJtlaRLQHg8pMpTo9XoF6IL5HLl+Qgb/eSNVuunFmYGmPbTX5/PRNDNdaFMIOTfVqx4pnJNfCQNF1o8esL1LDdjeLrbZKCe1mF5ELSwvWVVackutISO8iQDJYcidKjBv5Y4umE0DWS8ut/XWfDD8Uc675NB6av7Ey2RFCT0n55mSuvPKTBk9r6aSoSk3xWGUPpd7HbXoymwpXV16e6zryKvVQzvb7z1zFL6wY+cfFz6Ld1OVE0w2W1lR6YCtKPMM91Jz87L1u39+eND5VuBI8tiJ/QN1sW1vJmqW/DIvfqikOlZ5sXKT89veuZdqmarYqaN7Xjl2z+n5e+9f6us+e/DHutavW7Ze/q0ULe7aVwuOP9nvPMd8MlD1XuigVJ68bcXnQ/szZYM3n1lw/v2twwceDx4/2AKqnqsY0U53KKGaL7aAlQ+c2+S/sPti/MThy4Ontj/t+XDrNwvWVJ99/eLAa0ueqB7ZMTxSu/ydqvPzHvmhb+Ofj0mRA2sPPxvevuvQ762Sf9vS4RZn8XGyKbHlu5d/uryoGEXc+/g9g192P1VmD+y9L+QnTi5U9L/fSDu37Lrr5Km/9j1aN7L+4zuKL20u2vP8p3tv/appdPn+AeqvcOoxFgAA",
    "cache-control: no-cache",
    "postman-token: d926836a-1143-84ca-dc71-4ebfcc88b27c"
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