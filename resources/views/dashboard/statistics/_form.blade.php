                  <div class="grid grid-cols-2 gap-4">
                      <div>
                          <x-input-label for="title_en" :value="__('English Title')" />
                          <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en"
                              :value="old('title_en', $statistic->title['en'] ?? '')" autofocus />
                          <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                      </div>
                      <div>
                          <x-input-label for="title_ar" :value="__('Arabic Title')" />
                          <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar"
                              :value="old('title_ar', $statistic->title['ar'] ?? '')" />
                          <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                      </div>
                  </div>


                    <div class="grid grid-cols-1 gap-4 mt-4">
                        <div>
                            <x-input-label for="number" :value="__('Number')" />
                            <x-text-input id="number" class="block mt-1 w-full" type="number" name="number"
                                :value="old('number', $statistic->number ?? '')" />
                            <x-input-error :messages="$errors->get('number')" class="mt-2" />
                        </div>
                  <div class="grid grid-cols-1 gap-4">
                      <div class="mt-4">
                          <x-input-label for="icon" :value="__('Icon')" />
                          <x-text-input id="icon" class="block mt-1 w-full" type="text" name="icon"
                              :value="old('icon', $statistic->icon ?? '')" />
                          <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                      </div>

                  </div>
