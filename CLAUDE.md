# Claude AI - Krayin CRM Project Instructions

## Introduction

This document provides specific instructions for **Claude AI** when working with the Krayin CRM Laravel application deployed on cPanel Smarthost at `crm.pbmediaonline.pl`. Follow these guidelines to ensure safe, effective, and production-aware assistance.

---

## Table of Contents

1. [Project Overview](#project-overview)
2. [Understanding the Codebase](#understanding-the-codebase)
3. [Code Modification Guidelines](#code-modification-guidelines)
4. [cPanel Deployment Management](#cpanel-deployment-management)
5. [Common Tasks & Workflows](#common-tasks--workflows)
6. [Safety Protocols](#safety-protocols)
7. [Troubleshooting Guide](#troubleshooting-guide)

---

## Project Overview

### What is This Project?

**Krayin CRM v2.1** - A free, open-source Laravel-based Customer Relationship Management system forked from the official Krayin repository. This is a production application serving real business operations.

### Key Facts

- **Production URL**: `https://crm.pbmediaonline.pl`
- **Hosting**: cPanel Smarthost (shared hosting environment)
- **Main Branch**: `main` (directly connected to production)
- **PHP Version**: 8.1+
- **Laravel Version**: 8.1+
- **Database**: MySQL/MariaDB via cPanel
- **Frontend**: Vue.js 3 + Vite + TypeScript
- **Architecture**: Modular (Concord packages in `packages/Webkul/`)

### Critical Context

⚠️ **This is a PRODUCTION application**:
- Changes pushed to `main` branch deploy automatically via cPanel Git
- Database contains real business data
- Downtime impacts business operations
- Always prioritize stability over new features

---

## Understanding the Codebase

### Architecture Overview

Krayin CRM uses a **modular package-based architecture** powered by Concord:

```
packages/Webkul/
├── Admin/              # Admin panel, dashboard, UI components
├── Attribute/          # Custom attributes system (fields customization)
├── Contact/            # Contact/Company management
├── Core/               # Core functionality, helpers, base classes
├── Email/              # Email templates and integration
├── Lead/               # Lead management and pipeline
├── Product/            # Product catalog
├── Quote/              # Quote/Proposal generation
├── Tag/                # Tagging system
└── User/               # User authentication and management
```

### How Modules Work

Each Webkul package is a **self-contained Laravel module**:

```
packages/Webkul/Lead/
├── src/
│   ├── Config/              # Module configuration
│   ├── Console/             # Artisan commands
│   ├── Contracts/           # Interfaces
│   ├── Database/
│   │   ├── Migrations/      # Database migrations
│   │   ├── Seeders/         # Database seeders
│   │   └── Factories/       # Model factories
│   ├── Http/
│   │   ├── Controllers/     # Controllers
│   │   ├── Middleware/      # Middleware
│   │   └── Requests/        # Form requests
│   ├── Models/              # Eloquent models
│   ├── Providers/           # Service providers
│   ├── Repositories/        # Repository pattern
│   ├── Resources/
│   │   ├── assets/          # CSS/JS assets
│   │   ├── lang/            # Translations
│   │   └── views/           # Blade templates
│   └── Routes/              # Package routes
├── composer.json            # Package dependencies
└── package.json             # NPM dependencies (if needed)
```

### Key Conventions

#### 1. **Repository Pattern**
Krayin uses repositories for data access:

```php
// Instead of direct model access:
// Lead::find($id); ❌

// Use repositories:
app(\Webkul\Lead\Repositories\LeadRepository::class)->find($id); ✅
```

#### 2. **Service Providers**
Each package registers itself via service provider:

```php
// packages/Webkul/Lead/src/Providers/LeadServiceProvider.php
class LeadServiceProvider extends ServiceProvider
{
    public function register() {
        $this->registerConfig();
    }

    public function boot() {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'lead');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'lead');
    }
}
```

#### 3. **Concord Registration**
Packages are registered in `config/concord.php`:

```php
return [
    'modules' => [
        \Webkul\Core\Providers\CoreServiceProvider::class,
        \Webkul\User\Providers\UserServiceProvider::class,
        \Webkul\Lead\Providers\LeadServiceProvider::class,
        // ... other packages
    ]
];
```

#### 4. **Database Conventions**
- Table names: plural, snake_case (`leads`, `lead_persons`)
- Foreign keys: `{table}_id` (e.g., `lead_id`, `user_id`)
- Timestamps: `created_at`, `updated_at` (automatic)
- Soft deletes: `deleted_at` (when needed)

#### 5. **Route Naming**
Routes follow a consistent pattern:

```php
// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/leads', [LeadController::class, 'index'])
         ->name('admin.leads.index');

    Route::get('/leads/{id}', [LeadController::class, 'show'])
         ->name('admin.leads.show');

    Route::post('/leads', [LeadController::class, 'store'])
         ->name('admin.leads.store');
});
```

#### 6. **Blade Component System**
Krayin uses custom Blade components:

```blade
{{-- Use Krayin UI components --}}
<x-admin::layouts>
    <x-admin::form action="{{ route('admin.leads.store') }}">
        <x-admin::form.control-group>
            <x-admin::form.control-group.label>
                @lang('admin::app.leads.title')
            </x-admin::form.control-group.label>

            <x-admin::form.control-group.control
                type="text"
                name="title"
                :value="old('title')"
            />
        </x-admin::form.control-group>
    </x-admin::form>
</x-admin::layouts>
```

---

## Code Modification Guidelines

### When Reading Code

1. **Always Read Before Modifying**
   ```
   ✅ Read the file first with Read tool
   ✅ Understand existing patterns
   ✅ Check related files (controllers, models, views)
   ✅ Look for similar implementations in other packages
   ```

2. **Understand Dependencies**
   - Check `composer.json` for package dependencies
   - Check `package.json` for NPM dependencies
   - Understand how packages depend on each other

3. **Check for Existing Functionality**
   - Search codebase before creating new features
   - Reuse existing repositories and services
   - Follow established patterns

### When Writing Code

#### PHP Code Style

```php
<?php

namespace Webkul\Lead\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Webkul\Lead\Repositories\LeadRepository;

class LeadController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected LeadRepository $leadRepository
    ) {
    }

    /**
     * Display a listing of the leads.
     */
    public function index(): JsonResponse
    {
        $leads = $this->leadRepository->all();

        return response()->json([
            'data' => $leads,
        ]);
    }

    /**
     * Store a newly created lead.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'lead_value'  => 'nullable|numeric',
            'status'      => 'required|string',
        ]);

        $lead = $this->leadRepository->create($validated);

        return response()->json([
            'data'    => $lead,
            'message' => trans('admin::app.leads.create-success'),
        ], 201);
    }
}
```

**Key Points**:
- ✅ Use PHP 8.1+ features (constructor property promotion, typed properties)
- ✅ Type hint everything (parameters, return types)
- ✅ Use dependency injection (constructor injection)
- ✅ Follow PSR-12 coding standards
- ✅ Write PHPDoc comments for methods
- ✅ Use Laravel's validation system
- ✅ Return JSON responses with proper HTTP status codes
- ✅ Use translation helpers (`trans()`, `@lang()`)

#### Eloquent Models

```php
<?php

namespace Webkul\Lead\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Attribute\Traits\CustomAttribute;
use Webkul\User\Models\User;

class Lead extends Model
{
    use CustomAttribute;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'description',
        'lead_value',
        'status',
        'user_id',
        'lead_pipeline_id',
        'lead_pipeline_stage_id',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'lead_value' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the lead.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the products for the lead.
     */
    public function products(): HasMany
    {
        return $this->hasMany(LeadProduct::class);
    }
}
```

#### Database Migrations

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('lead_value', 12, 2)->nullable();
            $table->string('status')->default('new');

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('lead_pipeline_id')
                  ->constrained('lead_pipelines')
                  ->onDelete('cascade');

            $table->foreignId('lead_pipeline_stage_id')
                  ->constrained('lead_pipeline_stages')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
```

**Migration Best Practices**:
- ✅ Always include `up()` and `down()` methods
- ✅ Use foreign key constraints
- ✅ Define `onDelete` cascade behavior
- ✅ Use appropriate column types
- ✅ Add indexes for foreign keys and frequently queried columns
- ⚠️ **NEVER** run migrations automatically on production
- ⚠️ **ALWAYS** backup database before running migrations

#### Vue.js Components

```vue
<template>
    <div class="lead-card">
        <div class="lead-header">
            <h3>{{ lead.title }}</h3>
            <span class="lead-status" :class="`status-${lead.status}`">
                {{ lead.status }}
            </span>
        </div>

        <div class="lead-body">
            <p>{{ lead.description }}</p>
            <div class="lead-value">
                {{ formatCurrency(lead.lead_value) }}
            </div>
        </div>

        <div class="lead-actions">
            <button @click="editLead" class="btn btn-primary">
                Edit
            </button>
            <button @click="deleteLead" class="btn btn-danger">
                Delete
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import axios from 'axios';

interface Lead {
    id: number;
    title: string;
    description: string;
    lead_value: number;
    status: string;
}

const props = defineProps<{
    lead: Lead;
}>();

const emit = defineEmits<{
    (e: 'updated', lead: Lead): void;
    (e: 'deleted', id: number): void;
}>();

const formatCurrency = (value: number): string => {
    return new Intl.NumberFormat('pl-PL', {
        style: 'currency',
        currency: 'PLN',
    }).format(value);
};

const editLead = async () => {
    // Edit logic
};

const deleteLead = async () => {
    if (!confirm('Are you sure?')) return;

    try {
        await axios.delete(`/admin/leads/${props.lead.id}`);
        emit('deleted', props.lead.id);
    } catch (error) {
        console.error('Failed to delete lead:', error);
    }
};
</script>

<style scoped>
.lead-card {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 16px;
}

.lead-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.lead-status {
    padding: 4px 12px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 600;
}

.status-new {
    background-color: #e3f2fd;
    color: #1976d2;
}

.status-contacted {
    background-color: #fff3e0;
    color: #f57c00;
}

.status-qualified {
    background-color: #e8f5e9;
    color: #388e3c;
}
</style>
```

**Vue.js Best Practices**:
- ✅ Use `<script setup>` with TypeScript
- ✅ Define prop and emit types
- ✅ Use composition API
- ✅ Handle errors gracefully
- ✅ Use scoped styles
- ✅ Follow Vue 3 conventions

---

## cPanel Deployment Management

### Understanding cPanel Git Deployment

cPanel uses **Git™ Version Control** for deployment:

1. Repository is connected to cPanel via SSH key or HTTPS
2. When code is pushed to GitHub `main` branch
3. cPanel automatically detects the change (or manual pull)
4. `.cpanel.yml` file is executed for post-deployment tasks

### .cpanel.yml Configuration

```yaml
---
deployment:
  tasks:
    # 1. Install/Update Composer dependencies (production mode)
    - export COMPOSER_HOME=/home/username/.config/composer
    - /usr/local/bin/ea-php81 /opt/cpanel/composer/bin/composer install --no-dev --optimize-autoloader --no-interaction

    # 2. Clear Laravel caches
    - /usr/local/bin/ea-php81 artisan config:clear
    - /usr/local/bin/ea-php81 artisan route:clear
    - /usr/local/bin/ea-php81 artisan view:clear

    # 3. Cache Laravel configuration for performance
    - /usr/local/bin/ea-php81 artisan config:cache
    - /usr/local/bin/ea-php81 artisan route:cache
    - /usr/local/bin/ea-php81 artisan view:cache

    # 4. Optimize autoloader
    - /usr/local/bin/ea-php81 artisan optimize

    # 5. Fix file permissions
    - chmod -R 755 storage bootstrap/cache
    - chmod -R 775 storage/logs storage/framework

    # 6. Create symbolic link for storage (if needed)
    - /usr/local/bin/ea-php81 artisan storage:link

    # 7. Compile frontend assets (if Vite is not pre-built)
    # - npm ci
    # - npm run build

    # NOTE: Database migrations are NOT automated for safety
    # Run manually via SSH: php artisan migrate
```

### Critical .cpanel.yml Notes

⚠️ **What to Include**:
- ✅ Composer install with `--no-dev` (production)
- ✅ Cache clearing commands
- ✅ Cache optimization commands
- ✅ File permission fixes
- ✅ Storage link creation

⚠️ **What NOT to Include**:
- ❌ `php artisan migrate` (too dangerous to automate)
- ❌ `php artisan db:seed` (can duplicate data)
- ❌ `npm install` (if assets are pre-built in CI)
- ❌ Long-running processes (timeout limits)

### File Permissions on cPanel

```bash
# Correct permissions structure:
directories/           # 755 (rwxr-xr-x)
files/                 # 644 (rw-r--r--)
storage/               # 775 (rwxrwxr-x) - needs web server write access
storage/logs/          # 775 (rwxrwxr-x)
storage/framework/     # 775 (rwxrwxr-x)
storage/app/           # 775 (rwxrwxr-x)
bootstrap/cache/       # 775 (rwxrwxr-x)
```

### Database Management

**Via cPanel Interface**:
1. Navigate to **MySQL® Databases**
2. Select your database
3. Use **phpMyAdmin** for direct SQL queries
4. Create backups via **Backup Wizard**

**Via SSH (if available)**:
```bash
# SSH into cPanel account
ssh username@crm.pbmediaonline.pl

# Navigate to application
cd crm-pbmediaonline-pl

# Run migrations manually
php artisan migrate

# Rollback if needed
php artisan migrate:rollback

# Create database backup
php artisan backup:run  # if backup package installed
```

### Deployment Checklist

Before pushing to `main` branch:

- [ ] All tests pass locally (`php artisan test`)
- [ ] Code style check passes (`./vendor/bin/pint`)
- [ ] No `.env` file changes committed
- [ ] Database migrations are documented (if any)
- [ ] Frontend assets built (`npm run build`)
- [ ] No hardcoded credentials or API keys
- [ ] Reviewed `.cpanel.yml` for correctness
- [ ] Have database backup ready (if migrations needed)
- [ ] Deployment planned during low-traffic period
- [ ] Team notified of deployment

After deployment:

- [ ] Check application is accessible
- [ ] Review error logs (`storage/logs/laravel.log`)
- [ ] Check cPanel error_log
- [ ] Test critical functionality (login, main features)
- [ ] Verify file permissions (755/644/775)
- [ ] Monitor for a few hours post-deployment

---

## Common Tasks & Workflows

### Task 1: Adding a New Feature to Existing Package

**Example**: Add "Priority" field to Leads

```bash
# 1. Read existing Lead model and migrations
# packages/Webkul/Lead/src/Models/Lead.php
# packages/Webkul/Lead/src/Database/Migrations/

# 2. Create migration
php artisan make:migration add_priority_to_leads_table

# 3. Edit migration file
```

```php
// database/migrations/YYYY_MM_DD_HHMMSS_add_priority_to_leads_table.php
public function up(): void
{
    Schema::table('leads', function (Blueprint $table) {
        $table->string('priority')->default('medium')->after('status');
    });
}

public function down(): void
{
    Schema::table('leads', function (Blueprint $table) {
        $table->dropColumn('priority');
    });
}
```

```php
// 4. Update Model
// packages/Webkul/Lead/src/Models/Lead.php
protected $fillable = [
    'title',
    'description',
    'lead_value',
    'status',
    'priority',  // ← Add this
    'user_id',
    // ...
];
```

```blade
{{-- 5. Update View --}}
{{-- packages/Webkul/Lead/src/Resources/views/index.blade.php --}}
<x-admin::form.control-group>
    <x-admin::form.control-group.label>
        Priority
    </x-admin::form.control-group.label>

    <x-admin::form.control-group.control
        type="select"
        name="priority"
        :value="old('priority', $lead->priority ?? 'medium')"
    >
        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>
    </x-admin::form.control-group.control>
</x-admin::form.control-group>
```

```php
// 6. Update Controller validation
// packages/Webkul/Lead/src/Http/Controllers/LeadController.php
$validated = $request->validate([
    'title'       => 'required|string|max:255',
    'lead_value'  => 'nullable|numeric',
    'status'      => 'required|string',
    'priority'    => 'required|string|in:low,medium,high',  // ← Add this
]);
```

```php
// 7. Write tests
// tests/Feature/LeadPriorityTest.php
public function test_can_create_lead_with_priority(): void
{
    $response = $this->post('/admin/leads', [
        'title'    => 'Test Lead',
        'status'   => 'new',
        'priority' => 'high',
    ]);

    $response->assertStatus(201);
    $this->assertDatabaseHas('leads', [
        'title'    => 'Test Lead',
        'priority' => 'high',
    ]);
}
```

```bash
# 8. Run tests locally
php artisan test

# 9. Run migrations locally
php artisan migrate

# 10. Test in browser
php artisan serve

# 11. Commit changes
git add .
git commit -m "Add priority field to leads"
git push origin main

# 12. After deployment, run migration on production via SSH
ssh username@crm.pbmediaonline.pl
cd crm-pbmediaonline-pl
php artisan migrate
```

---

### Task 2: Creating a New Krayin Package

**Example**: Create a "Task" management package

```bash
# 1. Create package directory structure
mkdir -p packages/Webkul/Task/src/{Config,Database/{Migrations,Seeders},Http/{Controllers,Requests},Models,Providers,Repositories,Resources/{lang/en,views},Routes}

# 2. Create composer.json
```

```json
{
    "name": "webkul/task",
    "description": "Task management for Krayin CRM",
    "type": "library",
    "require": {
        "php": "^8.1",
        "illuminate/support": "^9.0"
    },
    "autoload": {
        "psr-4": {
            "Webkul\\Task\\": "src/"
        }
    }
}
```

```php
// 3. Create Service Provider
// packages/Webkul/Task/src/Providers/TaskServiceProvider.php
<?php

namespace Webkul\Task\Providers;

use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'task');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'task');
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/menu.php', 'menu.admin'
        );
    }
}
```

```php
// 4. Register in config/concord.php
return [
    'modules' => [
        // ... existing providers
        \Webkul\Task\Providers\TaskServiceProvider::class,
    ]
];
```

```php
// 5. Update composer.json autoload
"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Database\\Factories\\": "database/factories/",
        "Database\\Seeders\\": "database/seeders/",
        "Webkul\\Task\\": "packages/Webkul/Task/src/"
    }
}
```

```bash
# 6. Regenerate autoload
composer dump-autoload

# 7. Create migration, model, controller, etc.
# Follow standard Laravel/Krayin patterns
```

---

### Task 3: Debugging Production Issues

**Scenario**: Users report 500 errors on lead creation

```bash
# 1. SSH into cPanel (if available)
ssh username@crm.pbmediaonline.pl
cd crm-pbmediaonline-pl

# 2. Check Laravel logs
tail -n 100 storage/logs/laravel.log

# 3. Check cPanel PHP error log
tail -n 100 error_log

# 4. Enable detailed errors temporarily (ONLY for debugging)
# Edit .env (via cPanel File Manager or SSH)
APP_DEBUG=true
APP_ENV=local

# 5. Reproduce the error in browser
# Note the exact error message and stack trace

# 6. Identify the issue (example: missing database column)
# SQLSTATE[42S22]: Column not found: 1054 Unknown column 'priority'

# 7. Fix: Run missing migration
php artisan migrate

# 8. Test the fix
# Try creating lead again in browser

# 9. Disable debug mode (CRITICAL!)
APP_DEBUG=false
APP_ENV=production

# 10. Clear caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 11. Verify fix in production
# Test lead creation

# 12. Document in TROUBLESHOOTING.md
```

---

### Task 4: Updating Dependencies

```bash
# 1. Check for outdated packages
composer outdated

# 2. Update composer.json versions
# Edit composer.json with new version constraints

# 3. Update locally first
composer update

# 4. Run tests
php artisan test

# 5. Check for breaking changes
# Review vendor package changelogs

# 6. Test application locally
php artisan serve

# 7. Commit changes
git add composer.json composer.lock
git commit -m "Update dependencies: [list major updates]"
git push origin main

# 8. Monitor production after deployment
# Check logs for any dependency-related errors
```

---

### Task 5: Optimizing Performance

```bash
# 1. Cache configuration
php artisan config:cache

# 2. Cache routes
php artisan route:cache

# 3. Cache views
php artisan view:cache

# 4. Optimize autoloader
composer install --optimize-autoloader --no-dev

# 5. Enable OPcache (via .user.ini in cPanel)
# opcache.enable=1
# opcache.memory_consumption=128
# opcache.interned_strings_buffer=8
# opcache.max_accelerated_files=4000
# opcache.revalidate_freq=60

# 6. Database query optimization
# - Add indexes to frequently queried columns
# - Use eager loading to prevent N+1 queries
# - Cache expensive queries with Redis/Memcached (if available)

# 7. Frontend optimization
npm run build  # Minify and bundle assets with Vite
```

---

## Safety Protocols

### 🔴 NEVER DO THESE THINGS

1. **NEVER commit `.env` file**
   - Contains database credentials, API keys, secrets
   - Use `.env.example` as template instead

2. **NEVER push directly to `main` without testing**
   - Always test locally first
   - Run full test suite
   - Consider using feature branches

3. **NEVER run migrations automatically on production**
   - Too risky for data loss
   - Always manual review and execution
   - Backup database first

4. **NEVER disable security features**
   - Don't remove CSRF protection
   - Don't disable input validation
   - Don't trust user input

5. **NEVER leave `APP_DEBUG=true` in production**
   - Exposes sensitive information
   - Shows stack traces to users
   - Security vulnerability

6. **NEVER hardcode credentials**
   - Use environment variables
   - Use Laravel config system
   - Use encrypted values if needed

7. **NEVER ignore hosting constraints**
   - Shared hosting has memory limits
   - Max execution time limits exist
   - No root access available

8. **NEVER delete production files without backup**
   - Always backup database before changes
   - Keep previous deployment backup
   - Document rollback procedures

---

### 🟢 ALWAYS DO THESE THINGS

1. **ALWAYS read existing code before modifying**
   - Understand current implementation
   - Follow established patterns
   - Check for side effects

2. **ALWAYS test locally first**
   - Run test suite: `php artisan test`
   - Test in browser: `php artisan serve`
   - Check code style: `./vendor/bin/pint`

3. **ALWAYS backup database before schema changes**
   - Use cPanel backup wizard
   - Export via phpMyAdmin
   - Keep at least 3 recent backups

4. **ALWAYS use proper error handling**
   - Try-catch blocks for risky operations
   - Log errors appropriately
   - Return meaningful error messages

5. **ALWAYS validate user input**
   - Use Laravel validation
   - Sanitize before database storage
   - Validate file uploads

6. **ALWAYS use Eloquent ORM or Query Builder**
   - Prevents SQL injection
   - Provides cleaner syntax
   - Handles parameter binding

7. **ALWAYS document changes**
   - Write clear commit messages
   - Update relevant documentation
   - Add code comments for complex logic

8. **ALWAYS monitor after deployment**
   - Check logs for errors
   - Test critical functionality
   - Monitor for a few hours

---

## Troubleshooting Guide

### Issue: 500 Internal Server Error

**Symptoms**: White page, HTTP 500 error

**Diagnosis**:
```bash
# Check Laravel logs
tail -n 50 storage/logs/laravel.log

# Check PHP error log
tail -n 50 error_log
```

**Common Causes**:
1. **.env misconfiguration**
   - Check database credentials
   - Verify APP_KEY is set
   - Confirm correct APP_URL

2. **File permissions**
   - `storage/` needs 775
   - `bootstrap/cache/` needs 775

3. **Missing dependencies**
   - Run `composer install`

4. **Cached config with errors**
   - Run `php artisan config:clear`

---

### Issue: Database Connection Failed

**Symptoms**: "SQLSTATE[HY000] [1045] Access denied"

**Diagnosis**:
```bash
# Check .env database settings
cat .env | grep DB_

# Test MySQL connection via cPanel
# Use phpMyAdmin or Terminal
```

**Solution**:
```bash
# Update .env with correct credentials
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=username_krayin
DB_USERNAME=username_krayin
DB_PASSWORD=your_password

# Clear config cache
php artisan config:clear
php artisan config:cache
```

---

### Issue: Assets Not Loading (404)

**Symptoms**: CSS/JS files return 404

**Diagnosis**:
```bash
# Check if storage link exists
ls -la public/storage

# Check if assets are built
ls -la public/build
```

**Solution**:
```bash
# Create storage symlink
php artisan storage:link

# Build frontend assets
npm run build

# Clear view cache
php artisan view:clear
```

---

### Issue: Composer Install Fails

**Symptoms**: "Your requirements could not be resolved"

**Diagnosis**:
```bash
# Check PHP version
php -v  # Should be 8.1+

# Check composer version
composer --version

# Check for conflicts
composer diagnose
```

**Solution**:
```bash
# Clear composer cache
composer clear-cache

# Update composer
composer self-update

# Install with verbose output
composer install -vvv

# If still failing, remove vendor and lock
rm -rf vendor composer.lock
composer install
```

---

### Issue: Migration Fails

**Symptoms**: Migration error in production

**Diagnosis**:
```bash
# Check migration status
php artisan migrate:status

# Check database exists
mysql -u username -p -e "SHOW DATABASES;"
```

**Solution**:
```bash
# Rollback last migration
php artisan migrate:rollback

# Fresh migration (DANGER: loses data!)
# Only for development
php artisan migrate:fresh

# For production: fix migration file and re-run
php artisan migrate
```

---

### Issue: Permission Denied Errors

**Symptoms**: "Permission denied" when writing files

**Diagnosis**:
```bash
# Check storage permissions
ls -la storage/

# Check bootstrap/cache permissions
ls -la bootstrap/cache/
```

**Solution**:
```bash
# Fix permissions recursively
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# If still issues, check ownership (cPanel username)
chown -R username:username storage bootstrap/cache
```

---

## Conclusion

### Key Takeaways for Claude AI

1. ✅ **Understand the architecture**: Krayin uses modular packages
2. ✅ **Follow conventions**: Repository pattern, service providers, Concord
3. ✅ **Respect production**: Test locally, backup database, monitor logs
4. ✅ **Use proper tools**: Eloquent ORM, Laravel validation, Blade components
5. ✅ **cPanel constraints**: Shared hosting, limited resources, file permissions
6. ✅ **Safety first**: Never auto-migrate, never commit secrets, always test
7. ✅ **Documentation matters**: Update docs, write comments, clear commits
8. ✅ **Error handling**: Try-catch, log errors, meaningful messages

### When in Doubt

- **Read existing code** for patterns
- **Check documentation** (Laravel, Krayin, this file)
- **Test locally first** before production
- **Ask for clarification** if requirements are unclear
- **Backup before major changes** (database, files)
- **Monitor after deployment** (logs, functionality)

### Resources

- **Laravel Docs**: https://laravel.com/docs/9.x
- **Krayin Docs**: https://devdocs.krayin.com/
- **cPanel Docs**: https://docs.cpanel.net/
- **Project Docs**: `/docs/` directory
- **AI Prompts**: `AI_PROMPTS.md`
- **AI Instructions**: `AI_INSTRUCTIONS.md`

---

**Document Version**: 1.0.0
**Last Updated**: 2025-12-31
**Maintained By**: Development Team
**Review Cycle**: After major updates or quarterly
