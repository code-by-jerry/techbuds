@php
    $isEdit = isset($blog);
@endphp

<div class="space-y-6">
    <!-- Basic Information -->
    <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
        <h3 class="mb-4 text-lg font-semibold text-heading">Basic Information</h3>
        <div class="space-y-4">
            <!-- Title -->
            <div>
                <label for="title" class="mb-1 block text-sm font-medium text-heading">Title <span class="text-red-500">*</span></label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $blog->title ?? '') }}"
                    required
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    placeholder="Enter blog title"
                />
                @error('title')
                <p class="mt-1 text-xs text-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="mb-1 block text-sm font-medium text-heading">Slug</label>
                <input
                    type="text"
                    id="slug"
                    name="slug"
                    value="{{ old('slug', $blog->slug ?? '') }}"
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    placeholder="auto-generated-from-title"
                />
                <p class="mt-1 text-xs text-text-secondary">Leave empty to auto-generate from title</p>
                @error('slug')
                <p class="mt-1 text-xs text-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="mb-1 block text-sm font-medium text-heading">Category <span class="text-red-500">*</span></label>
                <input
                    type="text"
                    id="category"
                    name="category"
                    value="{{ old('category', $blog->category ?? '') }}"
                    required
                    list="categories"
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    placeholder="e.g., SEO, Web Development, Mobile App"
                />
                <datalist id="categories">
                    <option value="SEO">SEO</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Mobile App">Mobile App</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="IT Solutions">IT Solutions</option>
                    <option value="DevOps">DevOps</option>
                    <option value="Database Warehousing">Database Warehousing</option>
                    <option value="Graphic Design">Graphic Design</option>
                    <option value="UI/UX">UI/UX</option>
                </datalist>
                @error('category')
                <p class="mt-1 text-xs text-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Meta Description -->
            <div>
                <label for="meta_description" class="mb-1 block text-sm font-medium text-heading">Meta Description</label>
                <textarea
                    id="meta_description"
                    name="meta_description"
                    rows="2"
                    maxlength="500"
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    placeholder="SEO meta description (max 500 characters)"
                >{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
                <p class="mt-1 text-xs text-text-secondary">Recommended: 150-160 characters for optimal SEO</p>
                @error('meta_description')
                <p class="mt-1 text-xs text-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Excerpt -->
            <div>
                <label for="excerpt" class="mb-1 block text-sm font-medium text-heading">Excerpt</label>
                <textarea
                    id="excerpt"
                    name="excerpt"
                    rows="3"
                    maxlength="1000"
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    placeholder="Short excerpt for blog listing (max 1000 characters)"
                >{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
                @error('excerpt')
                <p class="mt-1 text-xs text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
        <h3 class="mb-4 text-lg font-semibold text-heading">Content</h3>
        <div>
            <label for="content" class="mb-1 block text-sm font-medium text-heading">Content <span class="text-red-500">*</span></label>
            <textarea
                id="content"
                name="content"
                rows="15"
                required
                class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20 font-mono"
                placeholder="Enter blog content (Markdown supported)"
            >{{ old('content', $blog->content ?? '') }}</textarea>
            <p class="mt-1 text-xs text-text-secondary">Supports Markdown formatting. Use ## for H2, ### for H3, ** for bold, * for lists</p>
            @error('content')
            <p class="mt-1 text-xs text-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Media & Settings -->
    <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
        <h3 class="mb-4 text-lg font-semibold text-heading">Media & Settings</h3>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <!-- Featured Image URL -->
            <div>
                <label for="featured_image" class="mb-1 block text-sm font-medium text-heading">Featured Image URL</label>
                <input
                    type="url"
                    id="featured_image"
                    name="featured_image"
                    value="{{ old('featured_image', $blog->featured_image ?? '') }}"
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    placeholder="https://example.com/image.jpg"
                />
                @error('featured_image')
                <p class="mt-1 text-xs text-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Published Date -->
            <div>
                <label for="published_date" class="mb-1 block text-sm font-medium text-heading">Published Date</label>
                <input
                    type="date"
                    id="published_date"
                    name="published_date"
                    value="{{ old('published_date', $blog->published_date ? $blog->published_date->format('Y-m-d') : '') }}"
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                />
                @error('published_date')
                <p class="mt-1 text-xs text-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Reading Time -->
            <div>
                <label for="reading_time" class="mb-1 block text-sm font-medium text-heading">Reading Time (minutes)</label>
                <input
                    type="number"
                    id="reading_time"
                    name="reading_time"
                    value="{{ old('reading_time', $blog->reading_time ?? '') }}"
                    min="1"
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    placeholder="Auto-calculated if empty"
                />
                <p class="mt-1 text-xs text-text-secondary">Leave empty to auto-calculate from content</p>
                @error('reading_time')
                <p class="mt-1 text-xs text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- Publishing Options -->
    <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
        <h3 class="mb-4 text-lg font-semibold text-heading">Publishing Options</h3>
        <div class="space-y-3">
            <!-- Is Published -->
            <label class="flex items-center gap-3 cursor-pointer">
                <input
                    type="hidden"
                    name="is_published"
                    value="0"
                />
                <input
                    type="checkbox"
                    name="is_published"
                    value="1"
                    {{ old('is_published', $blog->is_published ?? false) ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-border-default text-brand-primary focus:ring-brand-primary/20"
                />
                <span class="text-sm font-medium text-heading">Publish this blog</span>
            </label>

            <!-- Is Featured -->
            <label class="flex items-center gap-3 cursor-pointer">
                <input
                    type="hidden"
                    name="is_featured"
                    value="0"
                />
                <input
                    type="checkbox"
                    name="is_featured"
                    value="1"
                    {{ old('is_featured', $blog->is_featured ?? false) ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-border-default text-brand-primary focus:ring-brand-primary/20"
                />
                <span class="text-sm font-medium text-heading">Feature this blog</span>
            </label>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="flex items-center justify-end gap-3">
        <a href="{{ route('admin.blogs.index') }}" class="rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
            Cancel
        </a>
        <button type="submit" class="rounded-lg bg-brand-primary px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
            {{ $isEdit ? 'Update Blog' : 'Create Blog' }}
        </button>
    </div>
</div>

<script>
    // Auto-generate slug from title
    document.getElementById('title')?.addEventListener('input', function() {
        const slugInput = document.getElementById('slug');
        if (slugInput && !slugInput.value) {
            const title = this.value;
            const slug = title
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
            slugInput.value = slug;
        }
    });
</script>

