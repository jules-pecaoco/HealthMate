async function getFoodInfo() {
  // get the attribute from url
  const param = new URLSearchParams(window.location.search);
  const link = param.get("link");
  const fragment = window.location.hash;

  const fooduri = link + fragment;

  console.log(fooduri);

  // params for the api
  const params = new URLSearchParams({
    app_id: "c5d38b31",
    app_key: "baed3d960cee57c5e7f6a34a81172f2c",
    uri: fooduri,
  });

  // get the food info
  const response = await fetch(`https://api.edamam.com/api/recipes/v2/by-uri?${params}`);
  const data = await response.json();

  console.log(data);
  // pull data from api
  createFoodCard(
    data.hits[0].recipe.image,
    data.hits[0].recipe.label,
    data.hits[0].recipe.source,
    data.hits[0].recipe.ingredientLines,
    data.hits[0].recipe.dietLabels,
    data.hits[0].recipe.healthLabels
  );
}

function createFoodCard(img, title, info, ingredients, dietLabels, healthLabels) {
  // Main container
  const cardContainer = document.createElement("div");
  cardContainer.className = "w-full flex gap-5 h-full overflow-hidden";

  // Image container
  const imageContainer = document.createElement("div");
  imageContainer.className = "w-2/4 p-1 rounded-lg";

  const foodImage = document.createElement("img");
  foodImage.className = "size-full rounded-xl shadow-md";
  foodImage.src = img;
  foodImage.alt = "Food Image";

  imageContainer.appendChild(foodImage);

  // Details container
  const detailsContainer = document.createElement("div");
  detailsContainer.className = "w-2/4 flex flex-col gap-3 shadow-md p-4 rounded-md border-2 border-gray-100 overflow-y-auto";

  // Food title
  const foodTitle = document.createElement("h1");
  foodTitle.className = "text-4xl font-bold";
  foodTitle.textContent = title;
  detailsContainer.appendChild(foodTitle);

  // Function to create a details section
  function createDetailsSection(title, content) {
    const details = document.createElement("details");

    const summary = document.createElement("summary");
    summary.className = "text-xl font-bold text-pink-500";
    summary.textContent = title;

    const paragraph = document.createElement("p");
    paragraph.textContent = content;

    details.appendChild(summary);
    details.appendChild(paragraph);

    return details;
  }

  // Add sections
  detailsContainer.appendChild(createDetailsSection("Info", info));
  detailsContainer.appendChild(createDetailsSection("Ingredients", ingredients));
  detailsContainer.appendChild(createDetailsSection("Diet Labels", dietLabels));
  detailsContainer.appendChild(createDetailsSection("Health Labels", healthLabels));

  // Append everything to the main container
  cardContainer.appendChild(imageContainer);
  cardContainer.appendChild(detailsContainer);

  document.getElementById("food-card-container").appendChild(cardContainer);
}

document.addEventListener("DOMContentLoaded", getFoodInfo);
