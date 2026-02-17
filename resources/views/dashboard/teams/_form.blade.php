                  <div class="grid grid-cols-2 gap-4">
                      <div>
                          <x-input-label for="title_en" :value="__('English Title')" />
                          <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en"
                              :value="old('title_en', $team->title['en'] ?? ('' ?? ''))" autofocus />
                          <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                      </div>
                      <div>
                          <x-input-label for="title_ar" :value="__('Arabic Title')" />
                          <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar"
                              :value="old('title_ar', $team->title['ar'] ?? '')" autofocus />
                          <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                      </div>
                  </div>
                  <div class="mt-4">
                      <x-input-label for="image" />
                      <x-text-input accept="image/*" id="image" class="block mt-1 w-full" type="file"
                          name="image" />

                      @if (isset($team) && $team->image)
                          <img src="{{ asset($team->image->path) }}" alt="team Image" width="100">
                      @endif

                      <x-input-error :messages="$errors->get('image')" class="mt-2" />
                  </div>

                  <div class="grid grid-cols-3 gap-4">
                      <div class="mt-4">
                          <x-input-label for="position" :value="__('Position')" />
                          <x-text-input id="position" class="block mt-1 w-full" type="text" name="position"
                              :value="old('position', $team->position ?? '')" placeholder="e.g. CEO, Manager, etc." />
                          <x-input-error :messages="$errors->get('position')" class="mt-2" />
                      </div>
                  </div>
                  <div class="grid grid-cols-2 gap-4">
                      <div class="mt-4">
                          <x-input-label for="facebook" :value="__('Facebook')" />
                          <x-text-input id="facebook" class="block mt-1 w-full" type="text" name="facebook"
                              :value="old('facebook', $team->facebook ?? '')" />
                          <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
                      </div>
                      <div class="mt-4">
                          <x-input-label for="linkedin" :value="__('Linkedin')" />
                          <x-text-input id="linkedin" class="block mt-1 w-full" type="text" name="linkedin"
                              :value="old('linkedin', $team->linkedin ?? '')" placeholder="Jan 01 - Jan 10" />
                          <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
                      </div>
                  </div>
                  <div class="grid grid-cols-2 gap-4">
                      <div class="mt-4">
                          <x-input-label for="x" :value="__('X')" />
                          <x-text-input id="x" class="block mt-1 w-full" type="text" name="x"
                              :value="old('x', $team->x ?? '')" />
                          <x-input-error :messages="$errors->get('x')" class="mt-2" />
                      </div>
                      <div class="mt-4">
                          <x-input-label for="instagram" :value="__('Instagram')" />
                          <x-text-input id="instagram" class="block mt-1 w-full" type="text" name="instagram"
                              :value="old('instagram', $team->instagram ?? '')" placeholder="Jan 01 - Jan 10" />
                          <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
                      </div>
                  </div>
                  <div class="grid grid-cols-2 gap-4">
                      <div class="mt-4">
                          <x-input-label for="youtube" :value="__('Youtube')" />
                          <x-text-input id="youtube" class="block mt-1 w-full" type="text" name="youtube"
                              :value="old('youtube', $team->youtube ?? '')" />
                          <x-input-error :messages="$errors->get('youtube')" class="mt-2" />
                      </div>

                  </div>

