                  <div class="grid grid-cols-2 gap-4">
                      <div>
                          <x-input-label for="title_en" :value="__('English Title')" />
                          <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en"
                              :value="old('title_en', $event->title['en'] ?? ('' ?? ''))" autofocus />
                          <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                      </div>
                      <div>
                          <x-input-label for="title_ar" :value="__('Arabic Title')" />
                          <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar"
                              :value="old('title_ar', $event->title['ar'] ?? '')" autofocus />
                          <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                      </div>
                  </div>
                  <div class="mt-4">
                      <x-input-label for="image" />
                      <x-text-input accept="image/*" id="image" class="block mt-1 w-full" type="file"
                          name="image" />

                      @if (isset($event) && $event->image)
                          <img src="{{ asset($event->image->path) }}" alt="event Image" width="100">
                      @endif

                      <x-input-error :messages="$errors->get('image')" class="mt-2" />
                  </div>
                  <div class="grid grid-cols-2 gap-4">
                      <div class="mt-4">
                          <x-input-label for="content_en" :value="__('English Content')" />
                          <x-textarea id="content_en" rows="5" class="block mt-1 w-full"
                              name="content_en">{{ old('content_en', $event->content['en'] ?? '') }}</x-textarea>
                          <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
                      </div>
                      <div class="mt-4">
                          <x-input-label for="content_ar" :value="__('Arabic Content')" />
                          <x-textarea id="content_ar" rows="5" class="block mt-1 w-full"
                              name="content_ar">{{ old('content_ar', $event->content['ar'] ?? '') }}</x-textarea>
                          <x-input-error :messages="$errors->get('content_ar')" class="mt-2" />
                      </div>
                  </div>
                  <div class="grid grid-cols-3 gap-4">
                      <div class="mt-4">
                          <x-input-label for="hours" :value="__('Hours')" />
                          <x-text-input id="hours" class="block mt-1 w-full" type="text" name="hours"
                              :value="old('hours', $event->hours ?? '')" placeholder="10:00 AM - 18:00 PM" />
                          <x-input-error :messages="$errors->get('hours')" class="mt-2" />
                      </div>
                      <div class="mt-4">
                          <x-input-label for="date" :value="__('Date')" />
                          <x-text-input id="date" class="block mt-1 w-full" type="text" name="date"
                              :value="old('date', $event->date ?? '')" placeholder="Jan 01 - Jan 10" />
                          <x-input-error :messages="$errors->get('date')" class="mt-2" />
                      </div>
                      <div class="mt-4">
                          <x-input-label for="location" :value="__('Location')" />
                          <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"
                              :value="old('location', $event->location ?? '')" placeholder="123 Street, New York, USA" />
                          <x-input-error :messages="$errors->get('location')" class="mt-2" />
                      </div>

                  </div>
