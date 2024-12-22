let allergiesString;

// get all checked checkboxes
function handleAllergyChange() {
  const allergies = document.querySelectorAll('input[type="checkbox"]:checked');
  const allergyValues = Array.from(allergies).map((allergy) => allergy.value.toLowerCase());
  allergiesString = allergyValues.map((allergy) => `health=${allergy}`).join("&");
}

//get api request from this https://api.edamam.com/api/recipes/v2?app_id=c5d38b31&app_key=baed3d960cee57c5e7f6a34a81172f2c&q=[input]&health=[allselectedallergies]
async function searchFoods() {
  // get checked allergies
  handleAllergyChange();

  const searchInput = document.getElementById("searchInput").value;

  // make params string
  const app_id = "c5d38b31";
  const app_key = "baed3d960cee57c5e7f6a34a81172f2c";
  const type = "public";
  const params = new URLSearchParams({
    app_id: app_id,
    app_key: app_key,
    q: searchInput,
    type: type,
  });

  console.log(`https://api.edamam.com/api/recipes/v2?${params}&${allergiesString}`); // For debugging or further usage

  // make api request
  const response = await fetch(`https://api.edamam.com/api/recipes/v2?${params}&${allergiesString}`);
  const data = await response.json();

  //pull data from api
  const recipes = data.hits;
  recipes.forEach((recipe) => {
    const recipeData = recipe.recipe;
    const img = recipeData.image;
    const recipeid = recipeData.uri;
    const title = recipeData.label;
    const ingredients = recipeData.ingredientLines;
    const healthLabels = recipeData.healthLabels;
    const dietLabels = recipeData.dietLabels;
    const calories = recipeData.calories.toFixed(2);

    createHTMLS(img, recipeid, title, ingredients, healthLabels, dietLabels, calories);
  });
}

function createHTMLS(img, recipeid, title, ingredients, healthLabels, dietLabels, calories) {
  // Recipe Card
  const recipeCard = document.createElement("div");
  recipeCard.className = "flex gap-4 border-2 rounded-lg p-2 shadow-lg";

  // Recipe Image
  const recipeImage = document.createElement("img");
  recipeImage.alt = "Recipe Image";
  recipeImage.src = img;
  recipeImage.width = 250;

  // Recipe Details
  const recipeDetails = document.createElement("div");
  recipeDetails.className = "flex flex-col gap-2";

  // Title section
  const TitleSection = document.createElement("div");
  TitleSection.className = "flex flex-col items-left";

  const recipeTitle = document.createElement("h1");
  recipeTitle.className = "text-2xl font-bold mb-2";
  recipeTitle.textContent = title;

  const recipeLink = document.createElement("a");
  recipeLink.href = "nutrifood?link=" + recipeid;
  recipeLink.textContent = "View Meal Nutritional";
  recipeLink.className = "p-2 bg-pink-600 w-fit rounded-md text-white font-medium";

  TitleSection.appendChild(recipeTitle);
  TitleSection.appendChild(recipeLink);

  // Ingredients Section
  const ingredientsSection = document.createElement("div");
  ingredientsSection.className = "flex flex-col";

  const ingredientsTitle = document.createElement("span");
  ingredientsTitle.className = "text-black font-medium";
  ingredientsTitle.textContent = "Ingredients";

  const ingredientsText = document.createElement("p");
  ingredientsText.className = "text-gray-600";
  ingredientsText.textContent = ingredients.join(", ");

  ingredientsSection.appendChild(ingredientsTitle);
  ingredientsSection.appendChild(ingredientsText);

  // Health Labels Section
  const healthLabelsSection = document.createElement("div");
  healthLabelsSection.className = "flex flex-col";

  const healthLabelsTitle = document.createElement("span");
  healthLabelsTitle.className = "text-black font-medium";
  healthLabelsTitle.textContent = "Health Labels";

  const healthLabelsText = document.createElement("span");
  healthLabelsText.className = "text-gray-600";
  healthLabelsText.textContent = healthLabels.join(", ");

  healthLabelsSection.appendChild(healthLabelsTitle);
  healthLabelsSection.appendChild(healthLabelsText);

  // Diet Labels Section
  const dietLabelsSection = document.createElement("div");
  dietLabelsSection.className = "flex flex-col";

  const dietLabelsTitle = document.createElement("span");
  dietLabelsTitle.className = "text-black font-medium";
  dietLabelsTitle.textContent = "Diet Labels";

  const dietLabelsText = document.createElement("span");
  dietLabelsText.className = "text-gray-600";
  dietLabelsText.textContent = dietLabels.join(", ");

  dietLabelsSection.appendChild(dietLabelsTitle);
  dietLabelsSection.appendChild(dietLabelsText);

  // Calories Section
  const caloriesSection = document.createElement("div");
  caloriesSection.className = "flex flex-col";

  const caloriesTitle = document.createElement("span");
  caloriesTitle.className = "text-black font-medium";
  caloriesTitle.textContent = "Calories";

  const caloriesText = document.createElement("span");
  caloriesText.className = "text-gray-600";
  caloriesText.textContent = calories;

  caloriesSection.appendChild(caloriesTitle);
  caloriesSection.appendChild(caloriesText);

  // Assemble Recipe Details
  recipeDetails.appendChild(TitleSection);
  recipeDetails.appendChild(ingredientsSection);
  recipeDetails.appendChild(healthLabelsSection);
  recipeDetails.appendChild(dietLabelsSection);
  recipeDetails.appendChild(caloriesSection);

  // Assemble Recipe Card
  recipeCard.appendChild(recipeImage);
  recipeCard.appendChild(recipeDetails);

  // Append Recipe Card to the Body or a Container
  // document.body.appendChild(recipeCard);
  document.getElementById("results").appendChild(recipeCard);
}
