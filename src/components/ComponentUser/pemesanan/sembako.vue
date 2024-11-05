<template>
    <div data-layername="catalog" class="flex overflow-hidden flex-col bg-white">
      <header class="flex flex-col justify-center items-center px-16 py-5 w-full font-medium uppercase whitespace-nowrap bg-yellow-400 text-neutral-800 max-md:px-5 max-md:max-w-full">
        <div class="flex gap-5 justify-between items-center w-full max-w-[1407px] max-md:max-w-full">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/74d176c775012817fd54f22fea1d68c2016e5b29166f075f722bbeea1fa2b8e8?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Company logo" class="object-contain shrink-0 self-stretch max-w-full aspect-square w-[110px]" />
          <nav class="flex gap-10 self-stretch my-auto text-2xl max-md:max-w-full">
            <a href="#" data-layername="home" class="grow">Home</a>
            <a href="#" data-layername="shop">Shop</a>
            <a href="#" data-layername="features" class="basis-auto">Features</a>
            <a href="#" data-layername="contact" class="basis-auto">Contact</a>
          </nav>
          <div class="flex gap-10 self-stretch my-auto text-xl">
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/e608d8e1396fe5378b5cb66730a216edfec79a1313a9b0112743a5615520e4bf?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Search icon" class="object-contain shrink-0 my-auto w-8 aspect-square" />
            <button data-layername="login" class="px-10 py-3 rounded border-2 border-solid border-neutral-800 max-md:px-5">
              Login
            </button>
          </div>
        </div>
      </header>
      <main class="self-center mt-8 w-full max-w-[1556px] max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col">
          <aside data-layername="column" class="flex flex-col w-[24%] max-md:ml-0 max-md:w-full">
            <div class="flex flex-col max-md:mt-10">
              <div data-layername="minumanMakananSembako" class="self-start text-base leading-snug text-stone-800 text-opacity-70 max-md:ml-2.5">
                Minuman/Makanan/Sembako
              </div>
              <div data-layername="filtres" class="flex flex-col mt-9 w-full">
                <div class="flex gap-8 justify-between items-center max-w-full w-[360px]">
                  <h2 data-layername="cari" class="self-stretch my-auto text-4xl font-bold text-stone-800 w-[226px]">
                    Cari
                  </h2>
                  <button data-layername="resetAll" class="self-stretch my-auto text-2xl tracking-wider text-stone-800 text-opacity-50">
                    Reset all
                  </button>
                </div>
                <nav data-layername="filter" class="flex flex-col items-center mt-8 max-w-full text-xl font-medium text-stone-800 w-[359px]">
                  <div data-layername="title" class="flex flex-col w-full whitespace-nowrap max-w-[359px]">
                    <div class="flex gap-5 justify-between items-start w-full">
                      <div data-layername="text" class="w-[317px]">Makanan</div>
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/efe640c0a34bf41f56edd2a5a61f8d6bf437f6cac8576080ecf8a5d25188f129?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Expand icon" class="object-contain shrink-0 w-6 aspect-square" />
                    </div>
                    <div class="mt-2 w-full border border-solid bg-stone-50 border-stone-50 min-h-[1px]"></div>
                  </div>
                  <div data-layername="title" class="flex flex-col mt-8 w-full whitespace-nowrap">
                    <div class="flex flex-col items-end w-full max-w-[359px]">
                      <div class="flex gap-5 justify-between items-start w-full">
                        <div data-layername="text" class="w-[317px]">Minuman</div>
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/efe640c0a34bf41f56edd2a5a61f8d6bf437f6cac8576080ecf8a5d25188f129?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Expand icon" class="object-contain shrink-0 w-6 aspect-square" />
                      </div>
                    </div>
                    <div class="mt-2 w-full border border-solid bg-stone-50 border-stone-50 min-h-[1px]"></div>
                  </div>
                  <div data-layername="title" class="flex flex-col mt-8 w-full whitespace-nowrap max-w-[359px]">
                    <div class="flex gap-5 justify-between items-start w-full">
                      <div data-layername="text" class="w-[317px]">Sembako</div>
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/efe640c0a34bf41f56edd2a5a61f8d6bf437f6cac8576080ecf8a5d25188f129?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Expand icon" class="object-contain shrink-0 w-6 aspect-square" />
                    </div>
                    <div class="mt-2 w-full border border-solid bg-stone-50 border-stone-50 min-h-[1px]"></div>
                  </div>
                  <div data-layername="title" class="flex flex-col mt-8 w-full max-w-[359px]">
                    <div class="flex gap-5 justify-between items-start w-full">
                      <div data-layername="text" class="w-[317px]">
                        Cigaret hehe
                      </div>
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/efe640c0a34bf41f56edd2a5a61f8d6bf437f6cac8576080ecf8a5d25188f129?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Expand icon" class="object-contain shrink-0 w-6 aspect-square" />
                    </div>
                    <div class="mt-2 w-full border border-solid bg-stone-50 border-stone-50 min-h-[1px]"></div>
                  </div>
                  <div data-layername="title" class="flex flex-col mt-8 w-full max-w-[359px]">
                    <div class="flex gap-5 justify-between items-start w-full">
                      <div data-layername="text" class="w-[317px]">Ice Cream</div>
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/efe640c0a34bf41f56edd2a5a61f8d6bf437f6cac8576080ecf8a5d25188f129?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Expand icon" class="object-contain shrink-0 w-6 aspect-square" />
                    </div>
                    <div class="mt-2 w-full border border-solid bg-stone-50 border-stone-50 min-h-[1px]"></div>
                  </div>
                  <div data-layername="title" class="flex flex-col mt-8 w-full max-w-[359px]">
                    <div class="flex gap-5 justify-between items-start w-full">
                      <div data-layername="text" class="w-[317px]">
                        Es Cristal
                      </div>
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/efe640c0a34bf41f56edd2a5a61f8d6bf437f6cac8576080ecf8a5d25188f129?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Expand icon" class="object-contain shrink-0 w-6 aspect-square" />
                    </div>
                    <div class="mt-2 w-full border border-solid bg-stone-50 border-stone-50 min-h-[1px]"></div>
                  </div>
                  <div data-layername="title" class="flex flex-col mt-8 w-full max-w-[359px]">
                    <div class="flex gap-5 justify-between items-start w-full">
                      <div data-layername="text" class="w-[317px]">
                        Product Type
                      </div>
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/efe640c0a34bf41f56edd2a5a61f8d6bf437f6cac8576080ecf8a5d25188f129?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Expand icon" class="object-contain shrink-0 w-6 aspect-square" />
                    </div>
                    <div class="mt-2 w-full border border-solid bg-stone-50 border-stone-50 min-h-[1px]"></div>
                  </div>
                </nav>
              </div>
            </div>
          </aside>
          <section data-layername="column" class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">
            <div class="flex flex-col mt-3 w-full max-md:mt-10 max-md:max-w-full">
              <div class="flex flex-col w-full max-md:max-w-full">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f561ce3507ee89916cfdae0e6e2f2c9010d05fffc24830f584a3219357d03538?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Banner image" class="object-contain max-w-full aspect-[2.85] w-[1140px]" />
                <div class="flex flex-wrap gap-10 justify-between items-start mt-8 w-full text-xl font-medium max-w-[1140px] text-neutral-900 max-md:max-w-full">
                  <div data-layername="hasil">Hasil:.....</div>
                  <div data-layername="sort" class="flex gap-1 items-center">
                    <div data-layername="sortBy" class="self-stretch my-auto">
                      Sort by
                    </div>
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ffb839842664a3ba473bb30c66bb102d1da8ed3fc47eee6164f06b111acb1a2c?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Sort icon" class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                  </div>
                </div>
                <div class="flex flex-col mt-8 max-md:max-w-full">
                  <div class="flex flex-wrap gap-8 items-start max-md:max-w-full">
                    <article data-layername="card" class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                      <div data-layername="foto" class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                        <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/58c12c54939a8010efbd62931350cb52051cd7120af353be13449435426a48aa?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Indomie ayam bawang" class="object-cover absolute inset-0 size-full" />
                          <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div data-layername="sale" class="gap-2.5 self-stretch px-4 py-1.5 bg-orange-600 min-h-[32px]">
                              Sale
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                        <h3 data-layername="oysterPerpetualExplorer" class="text-xl font-semibold text-center">
                          Indomie ayam bawang
                        </h3>
                        <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                          <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span data-layername="" class="text-center">Rp</span>
                            <span data-layername="45880">3.000</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                      <div data-layername="foto" class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                        <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/fce3fe6501f0ff2428f10541781979baee8e7b98bca6ee446b7bfd841b354041?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Indomie jumbo" class="object-cover absolute inset-0 size-full" />
                          <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div data-layername="sale" class="gap-2.5 self-stretch px-4 py-1.5 bg-orange-600 min-h-[32px]">
                              Sale
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                        <h3 data-layername="oysterPerpetualExplorer" class="text-xl font-semibold text-center">
                          Indomie jumbo
                        </h3>
                        <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                          <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span data-layername="" class="text-center">Rp</span>
                            <span data-layername="45880">5.000</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                      <div data-layername="foto" class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                        <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/7e9b8705aac43d4e72f27f5dae66d274fafca8544247b06bd44bc2e55c75f676?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Indomie goreng" class="object-cover absolute inset-0 size-full" />
                          <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div data-layername="sale" class="gap-2.5 self-stretch px-4 py-1.5 bg-orange-600 min-h-[32px]">
                              Sale
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                        <h3 data-layername="oysterPerpetualExplorer" class="text-xl font-semibold text-center">
                          Indomie goreng
                        </h3>
                        <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                          <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span data-layername="" class="text-center">rp</span>
                            <span data-layername="45880">3.000</span>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="flex flex-wrap gap-8 items-start mt-8 max-md:max-w-full">
                    <article class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                      <div data-layername="foto" class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                        <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a23790a0f105b110b7ea6abe480034d65e4a43631696472c9a2bbc24daed2ce6?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Es teh jozz ori" class="object-cover absolute inset-0 size-full" />
                          <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div data-layername="sale" class="gap-2.5 self-stretch px-4 py-1.5 bg-orange-600 min-h-[32px]">
                              Sale
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                        <h3 data-layername="oysterPerpetualExplorer" class="text-xl font-semibold text-center">
                          es teh jozz ori
                        </h3>
                        <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                          <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span data-layername="" class="text-center">rp</span>
                            <span data-layername="45880">3.000</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                      <div data-layername="foto" class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                        <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ad4454a11458a273d1ccdd178119f0e246117bff798274cb59d6b4010b3377d4?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Es teh jozz susu" class="object-cover absolute inset-0 size-full" />
                          <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div data-layername="bestseller" class="gap-2.5 self-stretch px-4 py-1.5 bg-pink-700 min-h-[32px]">
                              bestseller
                            </div>
                            <div data-layername="sale" class="gap-2.5 self-stretch px-4 py-1.5 mt-2 bg-orange-600 min-h-[32px]">
                              Sale
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                        <h3 data-layername="oysterPerpetualExplorer" class="text-xl font-semibold text-center">
                          es teh jozz susu
                        </h3>
                        <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                          <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span data-layername="" class="text-center">rp</span>
                            <span data-layername="45880">5.000</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                      <div data-layername="foto" class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                        <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/0ba88d441a4066666059692c1bb31e8d888bf45c96be1805df19356e6d22239f?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Es teh jozz sirup" class="object-cover absolute inset-0 size-full" />
                          <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div data-layername="sale" class="gap-2.5 self-stretch px-4 py-1.5 bg-orange-600 min-h-[32px]">
                              Sale
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                        <h3 data-layername="oysterPerpetualExplorer" class="text-xl font-semibold text-center">
                          es teh jozz sirup
                        </h3>
                        <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                          <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span data-layername="" class="text-center">rp</span>
                            <span data-layername="45880">5.000</span>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="flex flex-wrap gap-8 items-start mt-8 max-md:max-w-full">
                    <article data-layername="card" class="flex flex-col p-5 whitespace-nowrap border border-solid border-stone-200 min-w-[240px] w-[360px]">
                      <div data-layername="foto" class="flex flex-col w-80 max-w-full text-base text-center lowercase text-stone-200">
                        <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f66e4f131443f14367ef3f92715fa8a0036750120cfe5ac8be98fcf62abe9ee9?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Beras" class="object-cover absolute inset-0 size-full" />
                          <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div data-layername="sale" class="gap-2.5 self-stretch px-4 py-1.5 bg-orange-600 min-h-[32px]">
                              Sale
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                        <h3 data-layername="oysterPerpetualExplorer" class="text-xl font-semibold text-center">
                          beras
                        </h3>
                        <div class="flex gap-2 items-center mt-2 text-3xl font-bold">
                          <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span data-layername="" class="text-center">rp</span>
                            <span data-layername="45880">63.000</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                      <div data-layername="foto" class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                        <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/6fa1d4938afb06c0a6d2b7ea90eb74fdeaff43bcc890499950133e1926727620?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Telur" class="object-cover absolute inset-0 size-full" />
                          <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div data-layername="new" class="gap-2.5 self-stretch px-4 py-1.5 bg-orange-600 min-h-[32px]">
                              sale
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                        <h3 data-layername="oysterPerpetualExplorer" class="text-xl font-semibold text-center">
                          telur
                        </h3>
                        <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                          <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span data-layername="" class="text-center">rp</span>
                            <span data-layername="45880">27.000</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                      <div data-layername="foto" class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                        <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/094c5bd399a826ae65585522fa743d9555d7f21778765a38c0d694ce79f93a5c?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Minyak goreng" class="object-cover absolute inset-0 size-full" />
                          <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div data-layername="sale" class="gap-2.5 self-stretch px-4 py-1.5 bg-orange-600 min-h-[32px]">
                              Sale
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                        <h3 data-layername="oysterPerpetualExplorer" class="text-xl font-semibold text-center">
                          minyak goreng
                        </h3>
                        <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                          <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span data-layername="" class="text-center">rp</span>
                            <span data-layername="45880">27.000</span>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="flex flex-wrap gap-8 items-start mt-8 max-md:max-w-full">
                    <article data-layername="card" class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                      <div data-layername="foto" class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                        <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/314d95742deb887de10000b5645ad0ae8a77f5ae2d96d979e51b3b1381b1edf0?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Es cream feast" class="object-cover absolute inset-0 size-full" />
                          <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div data-layername="sale" class="gap-2.5 self-stretch px-4 py-1.5 bg-orange-600 min-h-[32px]">
                              Sale
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                        <h3 data-layername="oysterPerpetualExplorer" class="text-xl font-semibold text-center">
                          es cream feast
                        </h3>
                        <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                          <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span data-layername="" class="text-center">rp</span>
                            <span data-layername="45880">5.000</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                      <div data-layername="foto" class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                        <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/7d16b68f2a8ef6467668fb67e1a07c4177ae5865dc6a914c6d920c57acd7d20c?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Es kristal" class="object-cover absolute inset-0 size-full" />
                          <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div data-layername="sale" class="gap-2.5 self-stretch px-4 py-1.5 bg-orange-600 min-h-[32px]">
                              Sale
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                        <h3 data-layername="oysterPerpetualExplorer" class="text-xl font-semibold text-center">
                          es kristal
                        </h3>
                        <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                          <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span data-layername="" class="text-center">rp</span>
                            <span data-layername="45880">10.000</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                      <div data-layername="foto" class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                        <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/269b22a3bcfe80769469f79979eb19ee413a1b39f210a230fd3774e82c976873?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Cornetto oreo" class="object-cover absolute inset-0 size-full" />
                          <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div data-layername="sale" class="gap-2.5 self-stretch px-4 py-1.5 bg-orange-600 min-h-[32px]">
                              Sale
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                        <h3 data-layername="oysterPerpetualExplorer" class="text-xl font-semibold text-center">
                          cornetto oreo
                        </h3>
                        <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                          <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span data-layername="" class="text-center">rp</span>
                            <span data-layername="45880">9.000</span>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
              <nav data-layername="12345" class="flex gap-6 items-start self-center mt-24 ml-3.5 text-base leading-snug text-center whitespace-nowrap max-md:mt-10">
                <div class="flex flex-col min-w-[240px] w-[260px]">
                  <div class="flex gap-5 justify-between pr-6 bg-stone-200 max-md:pr-5">
                    <div class="flex gap-6">
                      <div data-layername="1" class="px-6 text-white bg-neutral-900 h-[52px] w-[52px] max-md:px-5">
                        1
                      </div>
                      <div data-layername="2" class="my-auto text-neutral-900">
                        2
                      </div>
                    </div>
                    <div class="flex gap-10 my-auto text-neutral-900">
                      <div data-layername="3">3</div>
                      <div data-layername="">...</div>
                      <div data-layername="9">9</div>
                    </div>
                  </div>
                </div>
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/5c42521970605249d8ebd89946b2f74a7d24f71c0b2a1fa627b34df1bba62665?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Next page" class="object-contain shrink-0 aspect-square w-[52px]" />
              </nav>
            </div>
          </section>
        </div>
      </main>
      <footer class="flex flex-col justify-center items-center px-20 py-24 mt-40 w-full bg-yellow-300 max-md:px-5 max-md:mt-10 max-md:max-w-full">
        <div class="flex flex-col w-full max-w-[1386px] max-md:max-w-full">
          <div class="flex flex-wrap gap-5 justify-between items-start max-md:max-w-full">
            <div class="flex flex-col items-center self-stretch">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/7b2cdcc5f4a54c853a49578735544cc6bcda56c9be329ef8434ba70852cf9454?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Company logo" class="object-contain self-stretch w-full aspect-square" />
              <h4 data-layername="socialMedia" class="mt-5 text-2xl font-medium text-black">
                Social Media
              </h4>
              <div class="flex gap-5 justify-between items-start mt-7 max-w-full w-[178px]">
                <a href="#" aria-label="Facebook">
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/17a282d476aa7c5a0133dd781105c4f69899333bdbce103378189fdc24b20c50?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Facebook icon" class="object-contain shrink-0 w-8 aspect-square" />
                </a>
                <a href="#" aria-label="Twitter">
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/10dec1ba368ccd6980dd8c8103c2ef544eab5c546dc5519af34373ab1a254e49?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Twitter icon" class="object-contain shrink-0 mt-1 aspect-[1.21] w-[35px]" />
                </a>
                <a href="#" aria-label="Instagram">
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/64c26a0ea3662745864af556ab761e501f20e3e1093cd049e5b316dc1a1d1286?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995" alt="Instagram icon" class="object-contain shrink-0 self-stretch aspect-square w-[34px]" />
                </a>
              </div>
            </div>
            <nav class="flex flex-col mt-2.5 text-xl font-medium text-black whitespace-nowrap">
              <h4 data-layername="shop" class="self-start text-2xl uppercase">
                SHOP
              </h4>
              <a href="#" data-layername="products" class="mt-6 max-md:mr-1">Products</a>
              <a href="#" data-layername="overview" class="mt-5">Overview</a>
              <a href="#" data-layername="pricing" class="self-start mt-5">Pricing</a>
              <a href="#" data-layername="releases" class="mt-5 max-md:mr-1">Releases</a>
            </nav>
            <nav class="flex flex-col items-start mt-2.5 text-xl font-medium text-black">
              <h4 data-layername="company" class="self-stretch text-2xl uppercase">
                Company
              </h4>
              <a href="#" data-layername="aboutUs" class="mt-6">About us</a>
              <a href="#" data-layername="contact" class="mt-5">Contact</a>
              <a href="#" data-layername="news" class="mt-5">News</a>
              <a href="#" data-layername="support" class="mt-5">Support</a>
            </nav>
            <div class="flex flex-col mt-2.5 max-md:max-w-full">
              <h4 data-layername="stayUpToDate" class="self-start text-2xl font-medium text-black uppercase">
                Stay up to date
              </h4>
              <form class="flex flex-wrap gap-5 justify-between pl-7 mt-10 text-xl rounded border-2 border-black border-solid max-md:pl-5 max-md:max-w-full">
                <label for="email" class="sr-only">Enter your email</label>
                <input type="email" id="email" placeholder="Enter your email" aria-label="Enter your email" class="my-auto text-black bg-transparent border-none" />
                <button type="submit" data-layername="submit" class="px-5 py-3.5 font-medium text-amber-400 uppercase whitespace-nowrap bg-black max-md:px-5">
                  Submit
                </button>
              </form>
            </div>
          </div>
          <div class="flex flex-wrap gap-5 justify-between mt-8 text-xl font-semibold text-black whitespace-nowrap">
            <div class="shrink-0 my-auto max-w-full h-0.5 border-2 border-black border-solid w-[1051px]"></div>
            <a href="#" data-layername="terms">Terms</a>
            <a href="#" data-layername="privacy">Privacy</a>
            <a href="#" data-layername="cookies">Cookies</a>
          </div>
        </div>
      </footer>
    </div>
  </template>
  
  <script>
  export default {
    name: 'CatalogComponent'
  }
  </script>