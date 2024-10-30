<template>
  <main class="flex flex-col items-center">
    <!-- Header Section -->
    <header class="flex flex-col items-center">
      <!-- Main Title Centered -->
      <div class="flex flex-col items-center text-center">
        <h1 class="text-5xl text-green-900 max-md:text-4xl">Our products</h1>
      </div>

      <!-- Navigation Items -->
      <nav class="flex gap-10 items-center mt-8">
        <h2 class="text-2xl uppercase text-zinc-700">Sale</h2>

        <!-- "HOT" Section with underline -->
        <div class="flex flex-col items-center">
          <h2 class="text-2xl uppercase text-green-900">HOT</h2>
          <div class="shrink-0 h-0.5 w-full border-b-2 border-green-900"></div>
        </div>

        <h2 class="text-2xl uppercase text-zinc-700">New Arrivals</h2>
        <h2 class="text-2xl uppercase text-zinc-700">Accessories</h2>
      </nav>
    </header>

    <!-- Product List Section -->
    <section class="self-stretch mt-20 w-full max-md:mt-10">
      <div class="grid grid-cols-4 gap-5 max-md:grid-cols-2"> <!-- Mengubah grid menjadi 4 kolom pada layar besar dan 2 kolom pada layar kecil -->
        <!-- Product Cards (8 items) -->
        <article class="flex flex-col w-full max-w-[200px]">
          <div class="flex flex-col grow text-center text-neutral-700">
            <div class="flex shrink-0 bg-yellow-200 h-[250px]" role="img" aria-label="Spread Collar Shirt">
              <img src="@/assets/images/spread-collar-shirt.jpg" alt="Spread Collar Shirt" class="object-cover w-full h-full rounded" />
            </div>
            <h3 class="mt-2 text-xl font-semibold">Spread Collar Shirt</h3>
            <span class="mt-1 text-lg">$48.99</span>
          </div>
        </article>

        <article class="flex flex-col w-full max-w-[200px]">
          <div class="flex flex-col grow text-center text-neutral-700">
            <div class="flex shrink-0 bg-yellow-200 h-[250px]" role="img" aria-label="White Solid Formal Shirt">
              <img src="@/assets/images/white-solid-formal-shirt.jpg" alt="White Solid Formal Shirt" class="object-cover w-full h-full rounded" />
            </div>
            <h3 class="mt-2 text-xl font-semibold">White Solid Formal Shirt</h3>
            <span class="mt-1 text-lg">$39.00</span>
          </div>
        </article>

        <article class="flex flex-col w-full max-w-[200px]">
          <div class="flex flex-col grow text-center text-neutral-700">
            <div class="flex shrink-0 bg-yellow-200 h-[250px]" role="img" aria-label="Shine On Me Blouse">
              <img src="@/assets/images/shine-on-me-blouse.jpg" alt="Shine On Me Blouse" class="object-cover w-full h-full rounded" />
            </div>
            <h3 class="mt-2 text-xl font-semibold">Shine On Me Blouse</h3>
            <span class="mt-1 text-lg">$42.99</span>
          </div>
        </article>

        <article class="flex flex-col w-full max-w-[200px]">
          <div class="flex flex-col grow text-center text-neutral-700">
            <div class="flex shrink-0 bg-yellow-200 h-[250px]" role="img" aria-label="Gray Solid Padded Jacket">
              <img src="@/assets/images/gray-solid-padded-jacket.jpg" alt="Gray Solid Padded Jacket" class="object-cover w-full h-full rounded" />
            </div>
            <h3 class="mt-2 text-xl font-semibold">Gray Solid Padded Jacket</h3>
            <span class="mt-1 text-lg">$32.99</span>
          </div>
        </article>

        <article class="flex flex-col w-full max-w-[200px]">
          <div class="flex flex-col grow text-center text-neutral-700">
            <div class="flex shrink-0 bg-yellow-200 h-[250px]" role="img" aria-label="Printed Loose T-shirt">
              <img src="@/assets/images/printed-loose-t-shirt.jpg" alt="Printed Loose T-shirt" class="object-cover w-full h-full rounded" />
            </div>
            <h3 class="mt-2 text-xl font-semibold">Printed Loose T-shirt</h3>
            <span class="mt-1 text-lg">$39.99</span>
          </div>
        </article>

        <article class="flex flex-col w-full max-w-[200px]">
          <div class="flex flex-col grow text-center text-neutral-700">
            <div class="flex shrink-0 bg-yellow-200 h-[250px]" role="img" aria-label="Summer Wind Crop Shirt">
              <img src="@/assets/images/summer-wind-crop-shirt.jpg" alt="Summer Wind Crop Shirt" class="object-cover w-full h-full rounded" />
            </div>
            <h3 class="mt-2 text-xl font-semibold">Summer Wind Crop Shirt</h3>
            <span class="mt-1 text-lg">$39.95</span>
          </div>
        </article>

        <article class="flex flex-col w-full max-w-[200px]">
          <div class="flex flex-col grow text-center text-neutral-700">
            <div class="flex shrink-0 bg-yellow-200 h-[250px]" role="img" aria-label="Tailored Jacket">
              <img src="@/assets/images/tailored-jacket.jpg" alt="Tailored Jacket" class="object-cover w-full h-full rounded" />
            </div>
            <h3 class="mt-2 text-xl font-semibold">Tailored Jacket</h3>
            <span class="mt-1 text-lg">$46.00</span>
          </div>
        </article>

        <article class="flex flex-col w-full max-w-[200px]">
          <div class="flex flex-col grow text-center text-neutral-700">
            <div class="flex shrink-0 bg-yellow-200 h-[250px]" role="img" aria-label="Solid Round Neck T-shirt">
              <img src="@/assets/images/solid-round-neck-t-shirt.jpg" alt="Solid Round Neck T-shirt" class="object-cover w-full h-full rounded" />
            </div>
            <h3 class="mt-2 text-xl font-semibold">Solid Round Neck T-shirt</h3>
            <span class="mt-1 text-lg">$36.00</span>
          </div>
        </article>
      </div>
    </section>
  </main>
</template>

<script>
export default {
  name: 'ProductDisplay'
}
</script>
