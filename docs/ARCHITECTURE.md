# Ink & Paper - Software Architecture Document

## Project Overview
Blog platform built with Laravel 13.x, PHP 8.3+. Features: Post/Category/Tag management, user profiles, dashboard analytics, draft management, 2FA/passkeys.

## Tech Stack
**Backend**: Laravel 13.x, PHP 8.3+, Laravel Fortify, Resend email
**Frontend**: Blade, Tailwind CSS 4.0, Alpine.js 3.15, Quill 2.0, Axios
**Database**: MySQL/PostgreSQL/SQLite

## System Architecture
**Pattern**: MVC with Action classes for business logic
**No Jobs/Events/Listeners**: Not implemented
**No API**: Web routes only

## Database Design

### Models & Relationships
- **User**: hasMany(Post), hasMany(Tag), profile fields, 2FA, passkeys
- **Post**: belongsTo(User), belongsTo(Category), belongsToMany(Tag)
- **Category**: hasMany(Post)
- **Tag**: belongsTo(User), belongsToMany(Post), hasOne(TagReach)
- **TagReach**: belongsTo(Tag) - tracks views/status

### Key Tables
- `users`: id, name, email, username, bio, website, twitter, avatar_path, 2FA fields, passkeys
- `posts`: id, title, content, status (enum), cover_image, published_at, category_id, user_id
- `categories`: id, name, slug (unique), description
- `tags`: id, name, slug, description, user_id (unique slug per user)
- `tag_reaches`: id, tag_id (unique), status, total_views
- `post_tag`: pivot table with timestamps

## API / Routes

### Web Routes (routes/web.php)
**Public** (auth:web middleware):
- `/` - feed
- `/article/{id}` - article view
- `/author/{id}` - author profile
- `/category/{slug}` - category hub
- `/tag/{slug}` - tag archive
- `/search` - search results

**Dashboard**:
- `/dashboard` - main dashboard
- `/dashboard/analytics` - analytics
- `/dashboard/drafts` - drafts
- `/dashboard/analytics/{id}` - post analytics
- `/dashboard/earnings` - earnings
- `/dashboard/collaboration` - collaboration

**Management** (PageController - scaffolded views only):
- `/manage/categories` - categories list
- `/manage/categories/create` - create category
- `/manage/categories/{id}/edit` - edit category
- `/manage/tags` - tags list
- `/manage/tags/create` - create tag
- `/manage/content` - content management
- `/manage/members` - team members
- `/manage/invite` - invite members

**Settings**:
- `/settings/account` - account settings
- `/settings/profile` - profile settings (PUT update)
- `/settings/notifications` - notification settings
- `/settings/security` - security settings

**Social** (scaffolded):
- `/profile/followers` - followers
- `/profile/following` - following

**Resource Routes**:
- `categories` - full CRUD
- `posts` - CRUD except index
- `tags/search` - tag search API
- `tags` - CRUD except edit/show/create (uses modal)

## Business Logic

### Action Classes
- **CreateNewPost**: Creates post with cover image, handles tag creation/syncing via CreateNewTag
- **CreateNewTag**: Creates tag with slug, creates associated TagReach record
- **Fortify Actions**: Standard Fortify auth actions (CreateNewUser, ResetUserPassword, etc.)

### Enums
- **PostStatus**: PUBLISHED, ARCHIVE, DRAFT
- **TagStatus**: ACTIVE, TRENDING, INACTIVE

### Validation Rules
- Post: title (required), content (required), category_id (nullable), cover_image (image), tags (array), draft (string), published_at (date)
- Category: name (required), slug (required unique), description (nullable)
- Tag: name (required), slug (required unique per user), description (nullable)

## Authentication & Authorization
**Method**: Laravel Fortify (session-based)
**Guard**: web
**Features**: Registration, password reset, profile update, 2FA (enabled), passkeys/WebAuthn (enabled)
**No Roles/Permissions**: Simple auth only
**Middleware**: auth:web on all routes except `/`

## Current State Assessment

### COMPLETED Features
- User authentication (Fortify with 2FA/passkeys)
- Post CRUD with draft/published status
- Category CRUD
- Tag CRUD with search API and modal UI
- Tag reach/analytics tracking
- Post-tag many-to-many relationship
- Cover image upload
- Profile update with avatar
- Dashboard main view (posts list)
- Post create/edit views with tag input
- Category create/edit/index/show views
- Tag index view with modal
- Public feed view with trending tags

### INCOMPLETE Features
- Dashboard analytics (view exists, no logic)
- Dashboard drafts (view exists, no logic)
- Dashboard earnings (view exists, no logic)
- Dashboard collaboration (view exists, no logic)
- Dashboard post-analytics (view exists, no logic)
- Management pages (all scaffolded, no logic)
- Settings pages (all scaffolded, no logic except profile update)
- Social pages (all scaffolded, no logic)
- Public article view (scaffolded, no logic)
- Public author profile (scaffolded, no logic)
- Public category hub (scaffolded, no logic)
- Public tag archive (scaffolded, no logic)
- Public search (scaffolded, no logic)
- Subscription/pricing pages (scaffolded, no logic)

### REFERENCED BUT NOT BUILT
- Jobs/Events/Listeners (none exist)
- API routes (api.php doesn't exist)
- Email notifications (Resend configured but not used)
- File upload beyond cover/avatar
- Post scheduling (published_at field exists but no scheduling logic)
- Tag trending calculation (status field exists but no logic)
