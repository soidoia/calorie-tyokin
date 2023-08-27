<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Calo-Bank</title>
    <link href="https//fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        /* スタイル */
        body {
            background-color: #FFC0CB;
        }
        
        h1 {
            text-align: center;
        }
        
        .add-button,
        .delete-button {
            font-size: 16px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            
        }

        .food-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .food-item input {
            mergin-bottom: 20px;
        }

        .delete-button {
            margin-left: 10px;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // ドキュメント全体が読み込まれたときに実行する関数
            const foodItemsContainer = document.getElementById("food-items-container");
            const addButton = document.querySelector(".add-button");

            addButton.addEventListener("click", function() {
                // 追加ボタンがクリックされたときに実行される関数
                const foodItemDiv = document.createElement("div");
                foodItemDiv.className = "food-item";

                const foodNameInput = document.createElement("input");
                foodNameInput.type = "text";
                foodNameInput.name = "foods[]";
                foodNameInput.placeholder = "食品名";

                const calorieInput = document.createElement("input");
                calorieInput.type = "number";
                calorieInput.name = "calories[]";
                calorieInput.placeholder = "カロリー";

                const deleteButton = document.createElement("button");
                deleteButton.type = "button";
                deleteButton.className = "delete-button";
                deleteButton.textContent = "⊖"

                deleteButton.addEventListener("click", function() {
                    foodItemsContainer.removeChild(foodItemDiv);
                });

                foodItemDiv.appendChild(foodNameInput);
                foodItemDiv.appendChild(calorieInput);
                foodItemDiv.appendChild(deleteButton);

                foodItemsContainer.appendChild(foodItemDiv);
            });
        });

        // 食品アイテムを削除する関数
        function deleteFoodItem(button) {
            const foodItemDiv = button.parentElement;
            const foodItemsContainer = document.getElementById("food-items-container");
            foodItemsContainer.removeChild(foodItemDiv);
        }
    <script>
</head>
<body>
    <!-- HTMLのコンテンツ -->
    <h1>カロリー貯金箱</h1>
    <form action="/meals" method="POST">
        @csrf
        <div id="food-items-container">
            <div class="food-item">
                <h2>食品名</h2>
                <input type="text" name="meal[name]" placeholder="ごはん">
                <h2>カロリー</h2>
                <input type="text" name="meal[calories]" placeholder="カロリー">
                
            </div>
        </div>
       
        <input type="submit" value="保存">
    </form>
    <button type="button" class="delete-button" onclick="deleteFoodItem(this)">⊖(削除)</button>
     <button type="button" class="add-button" onclick="addFoodItem()">⊕(追加)</button>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
</body>
</html>