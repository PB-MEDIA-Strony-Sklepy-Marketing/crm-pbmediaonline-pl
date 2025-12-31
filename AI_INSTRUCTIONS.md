# AI Instructions - Krayin CRM Operational Guide

## Overview

This document provides step-by-step operational instructions for AI assistants working with the Krayin CRM Laravel application on cPanel Smarthost (`crm.pbmediaonline.pl`). Follow these workflows for safe, efficient, and production-ready assistance.

---

## Table of Contents

1. [Development Workflow](#development-workflow)
2. [Git Flow](#git-flow)
3. [Testing Procedures](#testing-procedures)
4. [Deployment Checklist](#deployment-checklist)
5. [Emergency Rollback Procedures](#emergency-rollback-procedures)
6. [Database Migration Workflow](#database-migration-workflow)
7. [Debugging Workflow](#debugging-workflow)
8. [Code Review Process](#code-review-process)
9. [Security Incident Response](#security-incident-response)
10. [Performance Optimization Workflow](#performance-optimization-workflow)

---

## Development Workflow

### Standard Feature Development Process

**Objective**: Add a new feature safely from conception to production

#### Phase 1: Understanding & Planning

**Step 1: Gather Requirements**
```
Actions:
1. Read user request carefully
2. Ask clarifying questions if needed
3. Identify affected packages/modules
4. Check for existing similar features
5. Document requirements clearly

Questions to ask:
- What problem does this solve?
- Who will use this feature?
- What are the acceptance criteria?
- Are there any constraints (performance, compatibility)?
- What should happen in edge cases?

Output: Clear requirements document
```

**Step 2: Analyze Current Codebase**
```
Actions:
1. Read relevant package structures
   - Models: packages/Webkul/[Package]/src/Models/
   - Controllers: packages/Webkul/[Package]/src/Http/Controllers/
   - Views: packages/Webkul/[Package]/src/Resources/views/
   - Routes: packages/Webkul/[Package]/src/Routes/

2. Identify patterns to follow
   - Repository usage
   - Controller structure
   - View component usage
   - Validation approach

3. Check for existing utilities/helpers to reuse

4. Review related tests for testing patterns

Output: Understanding of existing architecture and patterns
```

**Step 3: Design Solution**
```
Actions:
1. Plan database changes (if any)
   - New tables or columns
   - Relationships and foreign keys
   - Indexes needed

2. Plan code changes
   - New files to create
   - Existing files to modify
   - Dependencies to add

3. Plan testing approach
   - Unit tests needed
   - Feature tests needed
   - Manual test scenarios

4. Consider edge cases and error handling

5. Document the plan

Output: Detailed implementation plan
```

---

#### Phase 2: Implementation

**Step 4: Create Feature Branch** (if using branches)
```bash
# Create and switch to feature branch
git checkout -b feature/[feature-name]

# Example:
git checkout -b feature/add-lead-priority
```

**Step 5: Implement Database Changes**
```bash
# Generate migration
php artisan make:migration [descriptive_name]

# Example:
php artisan make:migration add_priority_to_leads_table
```

```php
// Edit migration file: database/migrations/YYYY_MM_DD_HHMMSS_add_priority_to_leads_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('priority')->default('medium')->after('status');
            $table->index('priority'); // Add index if filtering by priority
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropIndex(['priority']);
            $table->dropColumn('priority');
        });
    }
};
```

```bash
# Run migration locally
php artisan migrate

# Check migration status
php artisan migrate:status
```

**Step 6: Update Models**
```php
// Edit: packages/Webkul/Lead/src/Models/Lead.php

// Add to $fillable array
protected $fillable = [
    'title',
    'description',
    'lead_value',
    'status',
    'priority',  // ← New field
    // ... other fields
];

// Add to $casts if needed
protected $casts = [
    'lead_value' => 'decimal:2',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

// Add constants for priority values (good practice)
public const PRIORITY_LOW = 'low';
public const PRIORITY_MEDIUM = 'medium';
public const PRIORITY_HIGH = 'high';

public const PRIORITIES = [
    self::PRIORITY_LOW,
    self::PRIORITY_MEDIUM,
    self::PRIORITY_HIGH,
];
```

**Step 7: Update Controllers**
```php
// Edit: packages/Webkul/Lead/src/Http/Controllers/LeadController.php

use Webkul\Lead\Models\Lead;

public function store(Request $request): JsonResponse
{
    // Add validation
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string',
        'lead_value'  => 'nullable|numeric|min:0',
        'status'      => 'required|string',
        'priority'    => 'required|string|in:' . implode(',', Lead::PRIORITIES), // ← New validation
        // ... other fields
    ]);

    $lead = $this->leadRepository->create($validated);

    return response()->json([
        'data'    => $lead,
        'message' => trans('admin::app.leads.create-success'),
    ], 201);
}

public function update(Request $request, int $id): JsonResponse
{
    $validated = $request->validate([
        'title'       => 'sometimes|required|string|max:255',
        'priority'    => 'sometimes|required|string|in:' . implode(',', Lead::PRIORITIES), // ← Add here too
        // ... other fields
    ]);

    $lead = $this->leadRepository->update($validated, $id);

    return response()->json([
        'data'    => $lead,
        'message' => trans('admin::app.leads.update-success'),
    ]);
}
```

**Step 8: Update Views**
```blade
{{-- Edit: packages/Webkul/Lead/src/Resources/views/create.blade.php --}}

<x-admin::form method="POST" action="{{ route('admin.leads.store') }}">
    {{-- Existing fields --}}

    {{-- Add priority field --}}
    <x-admin::form.control-group class="mb-4">
        <x-admin::form.control-group.label class="required">
            @lang('admin::app.leads.priority')
        </x-admin::form.control-group.label>

        <x-admin::form.control-group.control
            type="select"
            name="priority"
            rules="required"
            :value="old('priority', 'medium')"
            :label="trans('admin::app.leads.priority')"
        >
            <option value="low">@lang('admin::app.leads.priority-low')</option>
            <option value="medium" selected>@lang('admin::app.leads.priority-medium')</option>
            <option value="high">@lang('admin::app.leads.priority-high')</option>
        </x-admin::form.control-group.control>

        <x-admin::form.control-group.error control-name="priority" />
    </x-admin::form.control-group>

    {{-- Other fields and buttons --}}
</x-admin::form>
```

**Step 9: Add Translations**
```php
// Edit: packages/Webkul/Lead/src/Resources/lang/en/app.php

return [
    'leads' => [
        'title' => 'Title',
        'status' => 'Status',
        'priority' => 'Priority', // ← New
        'priority-low' => 'Low',
        'priority-medium' => 'Medium',
        'priority-high' => 'High',
        // ... other translations
    ],
];
```

```php
// Edit: packages/Webkul/Lead/src/Resources/lang/pl/app.php (if Polish supported)

return [
    'leads' => [
        'title' => 'Tytuł',
        'status' => 'Status',
        'priority' => 'Priorytet', // ← Polish translation
        'priority-low' => 'Niski',
        'priority-medium' => 'Średni',
        'priority-high' => 'Wysoki',
        // ... other translations
    ],
];
```

---

#### Phase 3: Testing

**Step 10: Write Unit Tests**
```php
// Create: tests/Unit/Lead/LeadModelTest.php

<?php

namespace Tests\Unit\Lead;

use Tests\TestCase;
use Webkul\Lead\Models\Lead;

class LeadModelTest extends TestCase
{
    /** @test */
    public function it_has_priority_constants(): void
    {
        $this->assertEquals('low', Lead::PRIORITY_LOW);
        $this->assertEquals('medium', Lead::PRIORITY_MEDIUM);
        $this->assertEquals('high', Lead::PRIORITY_HIGH);

        $this->assertCount(3, Lead::PRIORITIES);
    }

    /** @test */
    public function it_has_priority_in_fillable(): void
    {
        $lead = new Lead();

        $this->assertContains('priority', $lead->getFillable());
    }

    /** @test */
    public function it_sets_default_priority(): void
    {
        // This would test if migration default works
        // Requires database interaction
    }
}
```

**Step 11: Write Feature Tests**
```php
// Create: tests/Feature/Lead/LeadPriorityTest.php

<?php

namespace Tests\Feature\Lead;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Webkul\Lead\Models\Lead;
use Webkul\User\Models\User;

class LeadPriorityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_lead_with_priority(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('admin.leads.store'), [
                'title'       => 'Test Lead',
                'status'      => 'new',
                'priority'    => 'high',
                'lead_value'  => 1000,
            ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('leads', [
            'title'    => 'Test Lead',
            'priority' => 'high',
        ]);
    }

    /** @test */
    public function priority_is_required_when_creating_lead(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('admin.leads.store'), [
                'title'  => 'Test Lead',
                'status' => 'new',
                // priority is missing
            ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['priority']);
    }

    /** @test */
    public function priority_must_be_valid_value(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('admin.leads.store'), [
                'title'    => 'Test Lead',
                'status'   => 'new',
                'priority' => 'invalid', // ← Invalid priority
            ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['priority']);
    }

    /** @test */
    public function user_can_update_lead_priority(): void
    {
        $user = User::factory()->create();
        $lead = Lead::factory()->create([
            'priority' => 'low',
            'user_id'  => $user->id,
        ]);

        $response = $this->actingAs($user)
            ->put(route('admin.leads.update', $lead->id), [
                'priority' => 'high',
            ]);

        $response->assertStatus(200);

        $this->assertEquals('high', $lead->fresh()->priority);
    }

    /** @test */
    public function user_can_filter_leads_by_priority(): void
    {
        // Create leads with different priorities
        $user = User::factory()->create();

        Lead::factory()->count(5)->create([
            'priority' => 'low',
            'user_id'  => $user->id,
        ]);

        Lead::factory()->count(3)->create([
            'priority' => 'high',
            'user_id'  => $user->id,
        ]);

        $response = $this->actingAs($user)
            ->get(route('admin.leads.index', ['priority' => 'high']));

        $response->assertStatus(200);
        $response->assertJsonCount(3, 'data');
    }
}
```

**Step 12: Run Tests Locally**
```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/Lead/LeadPriorityTest.php

# Run with coverage (if configured)
php artisan test --coverage

# Check code style
./vendor/bin/pint

# Run static analysis (if configured)
./vendor/bin/phpstan analyse
```

**Step 13: Manual Testing**
```bash
# Start local server
php artisan serve

# Open browser and test:
# 1. Navigate to leads
# 2. Create new lead with priority
# 3. Edit existing lead, change priority
# 4. View lead list, check priority displays
# 5. Filter by priority (if implemented)
# 6. Test validation (submit without priority)
# 7. Test all priority values (low, medium, high)

# Check browser console for JavaScript errors
# Check network tab for failed requests
```

---

#### Phase 4: Documentation & Review

**Step 14: Update Documentation**
```markdown
# Add to CHANGELOG.md

## [Unreleased]

### Added
- Lead priority field (low, medium, high)
- Priority filter in lead list
- Priority validation in create/update forms

### Changed
- Lead form now requires priority selection
- Database schema: added `priority` column to `leads` table

### Migration
- Run `php artisan migrate` to add priority column
```

```php
// Update PHPDoc in Controller
/**
 * Store a newly created lead.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\JsonResponse
 */
public function store(Request $request): JsonResponse
{
    // Method implementation
}
```

**Step 15: Code Self-Review**
```
Checklist:
□ All files read before modification
□ Followed Krayin conventions (repositories, service providers)
□ Used Eloquent ORM (no raw SQL)
□ Added proper validation
□ Used type hints and return types
□ Added PHPDoc comments
□ Followed PSR-12 coding standards
□ No hardcoded values (used constants)
□ Error handling implemented
□ Translations added (en, pl if applicable)
□ Tests written and passing
□ No security vulnerabilities introduced
□ Backwards compatible (or documented breaking change)
□ No sensitive data in code or logs
□ Optimized queries (no N+1 issues)
□ Frontend assets work correctly
```

---

#### Phase 5: Commit & Deploy

**Step 16: Commit Changes**
```bash
# Stage changes
git add .

# Review staged changes
git diff --staged

# Commit with descriptive message
git commit -m "Add priority field to leads

- Add priority column to leads table (low/medium/high)
- Add priority validation in LeadController
- Add priority field to create/update forms
- Add priority constants to Lead model
- Add translations for priority labels
- Write unit and feature tests for priority functionality

Migration required: php artisan migrate"

# Push to feature branch (if using)
git push origin feature/add-lead-priority

# Or push directly to main (if confident and tested)
git push origin main
```

**Step 17: Pre-Deployment Verification**
```
Final Checklist:
□ All tests pass (php artisan test)
□ Code style passes (./vendor/bin/pint)
□ No .env changes committed
□ composer.lock updated if dependencies changed
□ package-lock.json updated if npm dependencies changed
□ Frontend assets built (npm run build) if needed
□ Database backup ready (if migration required)
□ Deployment documented (migration steps)
□ Team notified of deployment
□ Low-traffic deployment time chosen
```

**Step 18: Production Deployment**
```
See: [Deployment Checklist](#deployment-checklist) section below
```

---

## Git Flow

### Branch Strategy

**Main Branch**: `main`
- Connected to production
- Always deployable
- Protected (requires review)

**Feature Branches**: `feature/[feature-name]`
- Created from `main`
- Merged back to `main` via PR or direct merge
- Deleted after merge

### Standard Git Workflow

```bash
# 1. Ensure main is up to date
git checkout main
git pull origin main

# 2. Create feature branch
git checkout -b feature/descriptive-name

# 3. Make changes, commit frequently
git add [files]
git commit -m "Descriptive message"

# 4. Push to remote
git push origin feature/descriptive-name

# 5. Create Pull Request (optional, if using PR workflow)
# Via GitHub interface

# 6. After review/approval, merge to main
git checkout main
git merge feature/descriptive-name

# 7. Push to main (triggers deployment)
git push origin main

# 8. Delete feature branch
git branch -d feature/descriptive-name
git push origin --delete feature/descriptive-name

# 9. Monitor deployment in cPanel Git interface
```

### Commit Message Format

```
<type>: <subject>

<body>

<footer>
```

**Types**:
- `feat`: New feature
- `fix`: Bug fix
- `docs`: Documentation changes
- `style`: Code style (formatting, no logic change)
- `refactor`: Code refactoring
- `test`: Adding or updating tests
- `chore`: Maintenance tasks

**Example**:
```
feat: Add priority field to leads

- Add priority column to leads table with values: low, medium, high
- Implement priority validation in LeadController
- Add priority dropdown to create/update forms
- Include priority filter in lead listing
- Add comprehensive tests for priority functionality

Migration required: php artisan migrate after deployment
Closes #123
```

---

## Testing Procedures

### Pre-Commit Testing

**Run Before Every Commit**:

```bash
# 1. Run full test suite
php artisan test

# Expected: All tests passing (green)
# If failures: Fix issues before committing

# 2. Check code style
./vendor/bin/pint

# Expected: No formatting issues
# Auto-fixes most issues

# 3. Static analysis (if configured)
./vendor/bin/phpstan analyse

# Expected: No errors at configured level
# Fix type errors and logic issues
```

### Pre-Push Testing

**Run Before Pushing to Main**:

```bash
# 1. Full test suite with coverage
php artisan test --coverage-html coverage/

# Check coverage report in coverage/index.html
# Aim for >70% coverage on new code

# 2. Manual testing checklist
```

**Manual Testing Checklist**:
```
□ Application starts without errors (php artisan serve)
□ Database migrations run successfully (php artisan migrate)
□ Login functionality works
□ New feature works as expected
□ Existing features still work (regression check)
□ Form validations work correctly
□ Error messages display properly
□ No JavaScript console errors
□ No PHP errors in logs (storage/logs/laravel.log)
□ Responsive design works (mobile, tablet, desktop)
□ Browser compatibility (Chrome, Firefox, Safari, Edge)
```

### Production Testing (Post-Deployment)

**After Deploying to Production**:

```bash
# 1. SSH into production (if available)
ssh username@crm.pbmediaonline.pl
cd crm-pbmediaonline-pl

# 2. Check logs for errors
tail -n 50 storage/logs/laravel.log
tail -n 50 error_log

# 3. Verify file permissions
ls -la storage/
ls -la bootstrap/cache/

# Expected: 775 permissions on directories
```

**Production Functionality Checklist**:
```
□ Website is accessible (https://crm.pbmediaonline.pl)
□ Login works
□ Dashboard loads
□ New feature is visible and functional
□ Critical features work: leads, contacts, activities
□ No visible errors or warnings
□ Email functionality works (if applicable)
□ File uploads work (if applicable)
□ No performance degradation
□ Database queries are efficient (check slow query log if enabled)
```

---

## Deployment Checklist

### Pre-Deployment Phase

**1. Code Verification** (30 minutes before)
```
□ All tests passing locally
□ Code style check passes
□ No merge conflicts
□ All dependencies up to date
□ .env.example updated (if config changes)
□ No secrets committed
□ Frontend assets built
□ Documentation updated
□ CHANGELOG.md updated
```

**2. Database Preparation** (20 minutes before)
```
□ Backup current database via cPanel
   - Navigate to: cPanel → Backup Wizard → Download Database Backup
   - Save backup locally with timestamp: krayin_YYYY-MM-DD_HHMMSS.sql.gz

□ Review migration files
   - Check up() and down() methods
   - Verify data integrity considerations
   - Estimate migration execution time

□ Plan migration execution
   - Manual: via SSH after deployment
   - Document exact commands to run
```

**3. Team Communication** (15 minutes before)
```
□ Notify team of deployment
   - Deployment time
   - Expected duration
   - Features being deployed
   - Any migrations required
   - Downtime (if any)

□ Confirm backup completion
□ Confirm rollback plan
```

**4. Deployment Window** (5 minutes before)
```
□ Choose low-traffic time
   - Check analytics for low-traffic period
   - Typically: early morning, late evening, weekends

□ Monitor current production health
   - Check error logs
   - Verify no ongoing issues
   - Check server resources (if accessible)
```

---

### Deployment Phase

**5. Execute Deployment** (T=0)
```bash
# Push to main branch (triggers cPanel Git deployment)
git push origin main

# Monitor cPanel Git interface
# cPanel → Git™ Version Control → Update (Pull)
# Watch for .cpanel.yml execution status
```

**6. cPanel Deployment Tasks** (Automated via .cpanel.yml)
```yaml
# These run automatically via .cpanel.yml:
- composer install --no-dev --optimize-autoloader
- php artisan config:clear
- php artisan route:clear
- php artisan view:clear
- php artisan config:cache
- php artisan route:cache
- php artisan view:cache
- chmod -R 755 storage bootstrap/cache
- php artisan storage:link
```

**7. Manual Post-Deployment Steps** (via SSH)
```bash
# SSH into production
ssh username@crm.pbmediaonline.pl
cd crm-pbmediaonline-pl

# If migrations needed:
php artisan migrate --force

# Verify migration success
php artisan migrate:status

# Clear OPcache (if configured)
# This depends on cPanel setup, might need to restart PHP via cPanel

# Verify file permissions
ls -la storage/ bootstrap/cache/
# Expected: 775 for directories, 644 for files
```

---

### Post-Deployment Phase

**8. Immediate Verification** (T+5 minutes)
```
□ Website loads: https://crm.pbmediaonline.pl
□ No white screen (500 errors)
□ Login page accessible
□ Can log in successfully
□ Dashboard loads without errors
□ New feature visible and accessible
```

**9. Functional Testing** (T+10 minutes)
```
Test critical paths:
□ User authentication (login/logout)
□ Lead creation
□ Contact management
□ Activity logging
□ New feature functionality
□ Existing features (no regression)
```

**10. Log Monitoring** (T+15 minutes)
```bash
# Via SSH
tail -f storage/logs/laravel.log

# Watch for:
- [ ] No fatal errors
- [ ] No exceptions
- [ ] No database errors
- [ ] No permission errors

# Check cPanel error_log
tail -f error_log

# Watch for:
- [ ] No PHP errors
- [ ] No warnings
```

**11. Performance Check** (T+30 minutes)
```
□ Page load times acceptable (<3 seconds)
□ No slow database queries (check logs)
□ No memory exhaustion errors
□ Server resources normal (if accessible)
```

**12. Extended Monitoring** (T+2 hours)
```
□ Monitor error logs periodically
□ Check for user-reported issues
□ Monitor application performance
□ Watch for any anomalies

# Set reminder to check logs:
# - After 2 hours
# - After 6 hours
# - Next business day
```

---

### Deployment Status Updates

**Communication Timeline**:

**T-30 min**: "Deployment starting in 30 minutes. [Brief description]. Expected duration: [X] minutes."

**T=0**: "Deployment in progress..."

**T+10**: "Deployment complete. Verification in progress..."

**T+15**: "✅ Deployment successful. All systems operational." OR "⚠️ Issues detected. Investigating..."

**T+2hrs**: "Monitoring update: [Status]"

---

## Emergency Rollback Procedures

### When to Rollback

**Immediate Rollback Triggers**:
- 🔴 Critical functionality broken (can't log in, database errors)
- 🔴 Data corruption or loss
- 🔴 Security vulnerability exposed
- 🔴 Site completely down (500/502/503 errors)
- 🔴 Multiple users reporting critical issues

**Consider Rollback**:
- 🟡 New feature has bugs (but site otherwise functional)
- 🟡 Performance significantly degraded
- 🟡 Non-critical errors appearing in logs
- 🟡 Unexpected behavior in specific scenarios

### Rollback Procedure

#### Method 1: Git Revert (Preferred for minor issues)

```bash
# 1. SSH into production
ssh username@crm.pbmediaonline.pl
cd crm-pbmediaonline-pl

# 2. Check current commit
git log -n 5

# 3. Identify commit to revert to
# Note the commit hash before the problematic deployment

# 4. Revert to previous commit
git revert HEAD --no-edit

# Or revert specific commit
git revert <commit-hash> --no-edit

# 5. Push revert
git push origin main

# 6. cPanel will auto-deploy the revert
# Monitor cPanel Git interface

# 7. Clear caches
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache

# 8. If migration was run, rollback migration
php artisan migrate:rollback --step=1

# 9. Verify rollback success
php artisan migrate:status
```

#### Method 2: Git Reset (For critical emergencies)

```bash
# 1. SSH into production
ssh username@crm.pbmediaonline.pl
cd crm-pbmediaonline-pl

# 2. Create backup of current state (just in case)
cp -r . ../crm-backup-$(date +%Y%m%d_%H%M%S)

# 3. Identify good commit to reset to
git log -n 10

# 4. Hard reset to previous commit (DESTRUCTIVE!)
git reset --hard <previous-good-commit-hash>

# 5. Force push (if needed, use with EXTREME caution)
# Only if you're certain this is correct
git push origin main --force

# WARNING: Force push can cause issues
# Coordinate with team before force pushing

# 6. Run deployment tasks manually
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache
chmod -R 755 storage bootstrap/cache

# 7. Rollback database if needed
php artisan migrate:rollback --step=1

# Or restore from backup
# mysql -u username -p database_name < backup.sql

# 8. Verify application
curl -I https://crm.pbmediaonline.pl
# Should return 200 OK
```

#### Method 3: Database Restore (If data corrupted)

```bash
# 1. Access cPanel → phpMyAdmin

# 2. Select krayin database

# 3. Export current state (for forensics)
# Export → Save as .sql file

# 4. Drop affected tables or entire database
# If entire database: Drop Database → Create new database with same name

# 5. Import backup
# Import → Choose backup file (krayin_YYYY-MM-DD_HHMMSS.sql.gz)
# Execute import

# 6. Verify import success
# Check table structure and row counts

# 7. Update .env if database name changed
# DB_DATABASE=restored_database_name

# 8. Test application
php artisan migrate:status
```

---

### Post-Rollback Actions

**1. Immediate** (T+0)
```
□ Verify site is functional
□ Test critical features
□ Check error logs (should be clean)
□ Notify team of rollback
□ Document what happened
```

**2. Investigation** (T+1 hour)
```
□ Analyze what went wrong
□ Review logs from failed deployment
□ Identify root cause
□ Document findings

Questions to answer:
- What was the trigger for rollback?
- What code changes caused the issue?
- Why didn't testing catch this?
- What was the impact on users?
- How long was the issue live?
```

**3. Fix & Re-deploy** (T+Hours to Days)
```
□ Fix the issue in development
□ Add tests to prevent recurrence
□ Test thoroughly in local environment
□ Consider staging environment test (if available)
□ Re-deploy with fixes
□ Monitor closely
```

**4. Post-Mortem** (T+1 week)
```
□ Write incident report
   - Timeline of events
   - Root cause analysis
   - Impact assessment
   - Lessons learned
   - Prevention measures

□ Update procedures
   - Improve testing checklist
   - Add to TROUBLESHOOTING.md
   - Update deployment checklist
   - Train team on prevention

□ Implement safeguards
   - Add automated tests
   - Add monitoring/alerts
   - Improve rollback procedures
```

---

## Database Migration Workflow

### Pre-Migration Phase

**1. Local Development**
```bash
# Create migration
php artisan make:migration descriptive_name_for_migration

# Edit migration file
# database/migrations/YYYY_MM_DD_HHMMSS_descriptive_name_for_migration.php

# Implement up() and down() methods
# - up(): Add/modify schema
# - down(): Reverse changes (for rollback)
```

**2. Migration Best Practices**
```php
// Good migration example
public function up(): void
{
    Schema::table('leads', function (Blueprint $table) {
        // Add column
        $table->string('priority')->default('medium')->after('status');

        // Add index
        $table->index('priority');

        // Add foreign key
        $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('leads', function (Blueprint $table) {
        // Remove in reverse order
        $table->dropForeign(['assigned_to']);
        $table->dropIndex(['priority']);
        $table->dropColumn(['priority', 'assigned_to']);
    });
}
```

**3. Test Migration Locally**
```bash
# Run migration
php artisan migrate

# Verify schema
php artisan db:show
php artisan db:table leads  # Check specific table

# Test rollback
php artisan migrate:rollback --step=1

# Verify rollback worked
php artisan db:table leads

# Re-run migration
php artisan migrate

# Test application with new schema
php artisan serve
# Manually test affected features
```

**4. Data Migration Considerations**
```php
// If migration involves data transformation
public function up(): void
{
    // 1. Add new column
    Schema::table('leads', function (Blueprint $table) {
        $table->string('priority')->nullable()->after('status');
    });

    // 2. Migrate data
    DB::table('leads')->update(['priority' => 'medium']); // Set default

    // 3. Make column non-nullable
    Schema::table('leads', function (Blueprint $table) {
        $table->string('priority')->default('medium')->change();
    });
}

// For large tables, use chunking
DB::table('leads')->orderBy('id')->chunk(1000, function ($leads) {
    foreach ($leads as $lead) {
        DB::table('leads')
            ->where('id', $lead->id)
            ->update(['priority' => 'medium']);
    }
});
```

---

### Production Migration Phase

**5. Pre-Production Checks**
```
□ Migration tested locally
□ Migration rollback tested
□ Data migration tested (if applicable)
□ Estimated execution time known
□ Large table migration optimized
□ Database backup created
□ Team notified
□ Low-traffic time chosen
```

**6. Create Production Database Backup**
```bash
# Via SSH
ssh username@crm.pbmediaonline.pl

# Create backup
php artisan db:backup  # If backup package installed

# Or via mysqldump
mysqldump -u username -p database_name > backup_$(date +%Y%m%d_%H%M%S).sql
gzip backup_*.sql

# Or via cPanel
# cPanel → Backup Wizard → Download Database Backup
```

**7. Execute Migration on Production**
```bash
# SSH into production
ssh username@crm.pbmediaonline.pl
cd crm-pbmediaonline-pl

# Check migration status before
php artisan migrate:status

# Run migration (--force required in production)
php artisan migrate --force

# Watch output carefully
# Look for errors or warnings

# Check migration status after
php artisan migrate:status

# Verify schema changes
php artisan db:table [table_name]
```

**8. Immediate Verification**
```bash
# Check application logs
tail -n 50 storage/logs/laravel.log

# Test application
curl -I https://crm.pbmediaonline.pl
# Should return 200 OK

# Test affected features manually in browser

# Check database data
mysql -u username -p
USE database_name;
SELECT * FROM leads LIMIT 10;  # Verify new columns exist
```

---

### Post-Migration Phase

**9. Monitoring** (First 24 hours)
```
□ Monitor error logs for database errors
□ Check for N+1 query issues with new relationships
□ Monitor application performance
□ Watch for user-reported issues
□ Verify data integrity
```

**10. Migration Rollback (If Issues)**
```bash
# If issues detected, rollback migration
php artisan migrate:rollback --step=1

# Restore database from backup if data corrupted
mysql -u username -p database_name < backup_YYYYMMDD_HHMMSS.sql

# Or via cPanel → phpMyAdmin → Import
```

---

### Migration Safety Rules

**✅ DO:**
- Always create `down()` method for rollback
- Test migrations locally first
- Backup database before running migrations
- Use transactions where possible (`DB::transaction()`)
- Chunk large data migrations
- Add indexes for foreign keys
- Use appropriate column types and constraints
- Document breaking changes
- Run during low-traffic periods

**❌ DON'T:**
- Modify existing migration files after they've run in production
- Run migrations without backup
- Forget to test rollback
- Use raw SQL unless necessary (use Schema builder)
- Drop columns without consideration for old code
- Ignore foreign key constraints
- Run untested migrations in production
- Automate production migrations in .cpanel.yml

---

## Debugging Workflow

### Step-by-Step Debugging Process

#### Phase 1: Reproduce the Issue

**1. Gather Information**
```
Questions to ask:
□ What is the exact error message?
□ Where does it occur (URL/page/action)?
□ Steps to reproduce?
□ When did it start happening?
□ Does it happen for all users or specific users?
□ Does it happen consistently or intermittently?
□ Any recent changes deployed?
□ Any patterns (time of day, specific data, etc.)?
```

**2. Reproduce Locally**
```bash
# Pull latest code
git pull origin main

# Update dependencies
composer install
npm install

# Run migrations
php artisan migrate

# Seed data if needed
php artisan db:seed

# Start local server
php artisan serve

# Try to reproduce the issue
# Follow exact steps from user report
```

---

#### Phase 2: Locate the Issue

**3. Check Laravel Logs**
```bash
# View recent logs
tail -n 100 storage/logs/laravel.log

# Follow logs in real-time
tail -f storage/logs/laravel.log

# Search for specific errors
grep "ERROR" storage/logs/laravel.log
grep "CRITICAL" storage/logs/laravel.log
grep "Exception" storage/logs/laravel.log

# Look for:
- Exception class and message
- Stack trace
- File and line number
- Context (user ID, request data)
```

**4. Check Production Logs** (via SSH)
```bash
ssh username@crm.pbmediaonline.pl
cd crm-pbmediaonline-pl

# Laravel logs
tail -n 100 storage/logs/laravel.log

# PHP error logs
tail -n 100 error_log

# Apache error logs (if accessible via cPanel)
# cPanel → Errors → Error Log
```

**5. Enable Debug Mode Temporarily** (Production - CAREFUL!)
```bash
# Edit .env via cPanel File Manager or SSH
APP_DEBUG=true
APP_ENV=local

# Clear config cache
php artisan config:clear

# IMMEDIATELY after reproducing:
# Disable debug mode
APP_DEBUG=false
APP_ENV=production

# Cache config
php artisan config:cache
```

**6. Add Temporary Logging**
```php
// Add to suspected code location
use Illuminate\Support\Facades\Log;

Log::info('Checkpoint 1', ['data' => $someVariable]);
Log::debug('User data', ['user' => $user->toArray()]);
Log::error('Error occurred', ['exception' => $e->getMessage()]);

// Or use dump/dd for local development
dump($variable);  // Dump and continue
dd($variable);    // Dump and die
```

---

#### Phase 3: Analyze the Root Cause

**7. Analyze Stack Trace**
```
Stack trace analysis:
1. Start from the TOP (most recent call)
2. Identify the first file in YOUR code (not vendor/)
3. Note the file path and line number
4. Read the code at that location
5. Understand what operation failed
6. Trace backwards to understand context
```

**8. Common Issue Patterns**

**Database Errors**:
```
SQLSTATE[42S22]: Column not found
→ Check migration has run: php artisan migrate:status
→ Clear config cache: php artisan config:cache

SQLSTATE[23000]: Integrity constraint violation
→ Check foreign key constraints
→ Verify related records exist

SQLSTATE[HY000]: General error: 2006 MySQL server has gone away
→ Increase max_execution_time
→ Chunk large queries
→ Check MySQL timeout settings
```

**Permission Errors**:
```
file_put_contents(): failed to open stream: Permission denied
→ Check storage/ permissions: ls -la storage/
→ Fix: chmod -R 775 storage/ bootstrap/cache/
→ Check ownership: chown -R user:user storage/
```

**Class Not Found**:
```
Class 'Webkul\Lead\Models\Lead' not found
→ Run: composer dump-autoload
→ Check namespace in file
→ Check composer.json autoload section
```

**View Not Found**:
```
View [lead::index] not found
→ Check view exists: packages/Webkul/Lead/src/Resources/views/index.blade.php
→ Check service provider loads views
→ Clear view cache: php artisan view:clear
```

---

#### Phase 4: Implement Fix

**9. Write Failing Test First** (TDD approach)
```php
// tests/Feature/BugFixes/IssueXXXTest.php

/** @test */
public function it_should_not_throw_error_when_creating_lead_without_priority(): void
{
    // This test reproduces the bug
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->post(route('admin.leads.store'), [
            'title' => 'Test Lead',
            'status' => 'new',
            // priority intentionally missing
        ]);

    // This should NOT throw exception
    // But it does (before fix)
    $response->assertStatus(422);  // Should return validation error, not 500
}
```

**10. Implement Fix**
```php
// Example fix: Add validation
public function store(Request $request): JsonResponse
{
    $validated = $request->validate([
        'title'    => 'required|string|max:255',
        'status'   => 'required|string',
        'priority' => 'required|string|in:low,medium,high',  // ← Add validation
    ]);

    $lead = $this->leadRepository->create($validated);

    return response()->json([
        'data'    => $lead,
        'message' => trans('admin::app.leads.create-success'),
    ], 201);
}
```

**11. Verify Fix Locally**
```bash
# Run the new test
php artisan test tests/Feature/BugFixes/IssueXXXTest.php

# Should pass after fix

# Run full test suite
php artisan test

# Manual test
php artisan serve
# Reproduce original bug scenario
# Should now handle gracefully
```

---

#### Phase 5: Deploy & Verify

**12. Deploy Fix**
```bash
# Commit fix
git add .
git commit -m "Fix: Handle missing priority in lead creation

- Add required validation for priority field
- Return 422 validation error instead of 500 server error
- Add test to prevent regression

Fixes #XXX"

# Push to production
git push origin main
```

**13. Verify in Production**
```bash
# SSH to production
ssh username@crm.pbmediaonline.pl
cd crm-pbmediaonline-pl

# Check logs after deployment
tail -f storage/logs/laravel.log

# Manually test the fix
# Try original bug scenario
# Should now work correctly
```

**14. Monitor**
```
□ Watch logs for 1-2 hours after fix
□ Check for related errors
□ Confirm user feedback (issue resolved)
□ Mark issue as closed
```

---

#### Phase 6: Document & Prevent

**15. Document the Fix**
```markdown
# Add to TROUBLESHOOTING.md

## Error: 500 Server Error When Creating Lead

**Symptoms**: Server error (500) when submitting lead creation form

**Cause**: Missing validation for required `priority` field causing database constraint violation

**Solution**:
1. Ensure `priority` field is included in form
2. Validate `priority` field in controller (required, in:low,medium,high)

**Prevention**: Always add validation rules for required database columns

**Code Location**: packages/Webkul/Lead/src/Http/Controllers/LeadController.php:store()

**Related**: Issue #XXX, Commit abc123
```

**16. Prevent Recurrence**
```
Preventive measures:
□ Add test coverage for this scenario
□ Review similar code for same issue
□ Add to code review checklist
□ Update validation documentation
□ Add to common errors guide
```

---

## Code Review Process

### Pre-Review (Developer)

**Before Requesting Review**:
```
□ Self-review code changes
□ All tests passing
□ Code style check passes
□ No debug code left (dump, dd, console.log)
□ No commented-out code
□ No TODO comments without issue reference
□ Proper commit messages
□ Documentation updated
□ CHANGELOG.md updated (if applicable)
```

---

### Review Checklist (Reviewer)

**1. Functionality**
```
□ Code meets requirements
□ Edge cases handled
□ Error handling appropriate
□ Validation comprehensive
□ Business logic correct
```

**2. Code Quality**
```
□ Follows Laravel conventions
□ Follows Krayin patterns
□ DRY principle (no duplication)
□ SOLID principles
□ Single Responsibility Principle
□ Clear, descriptive naming
□ Appropriate method/function length (<50 lines ideal)
□ Appropriate class responsibilities
□ No code smells
```

**3. Security**
```
□ No SQL injection (uses Eloquent/Query Builder)
□ No XSS vulnerabilities (escaped output)
□ CSRF protection present
□ Input validation comprehensive
□ Authorization checks present
□ No hardcoded secrets
□ File uploads validated
□ No mass assignment vulnerabilities
```

**4. Performance**
```
□ No N+1 query issues
□ Appropriate eager loading
□ Indexed database columns
□ Efficient algorithms
□ No unnecessary loops
□ Query result chunked for large datasets
□ Appropriate caching
```

**5. Testing**
```
□ Adequate test coverage
□ Unit tests for business logic
□ Feature tests for endpoints
□ Edge cases tested
□ Error conditions tested
□ Mock external dependencies
□ Tests actually test what they claim
```

**6. Documentation**
```
□ PHPDoc comments present
□ Complex logic explained
□ README updated (if needed)
□ API documentation updated (if API changes)
□ Inline comments for non-obvious code
```

**7. Database**
```
□ Migrations have up() and down()
□ Foreign keys defined
□ Indexes added where needed
□ Column types appropriate
□ Default values appropriate
□ Migrations tested locally
```

**8. Frontend (if applicable)**
```
□ Vue.js best practices
□ TypeScript types defined
□ Responsive design
□ Accessibility considerations
□ No console errors
□ Proper error handling
```

---

### Review Comments Guidelines

**Good Comments**:
```
✅ "Consider using eager loading here to prevent N+1 queries:
   $leads = Lead::with('user', 'products')->get();"

✅ "Security concern: User input not validated. Add validation:
   $request->validate(['email' => 'required|email']);"

✅ "Minor: Variable naming could be clearer.
   $d → $deadline or $dueDate"

✅ "Question: Should we handle the case where user is null?"

✅ "Suggestion: Extract this logic into a separate method for reusability."

✅ "Great job handling this edge case!"
```

**Avoid**:
```
❌ "This is wrong" (not constructive)
❌ "I would do it differently" (without explanation)
❌ "Change this" (without reason)
❌ Nitpicking style (if automated tools available)
❌ Suggesting unnecessary abstractions
❌ Bikeshedding (debating trivial matters)
```

---

### Review Process

**1. Initial Review** (15-30 minutes)
```
- Read through all changes
- Understand the feature/fix
- Note any questions or concerns
- Check against review checklist
```

**2. Provide Feedback**
```
Categorize comments:
- 🔴 Critical: Must fix (security, bugs, breaking changes)
- 🟡 Important: Should fix (best practices, maintainability)
- 🟢 Suggestion: Nice to have (optimization, style preferences)
- 💡 Question: Seeking clarification
- 👍 Praise: Positive feedback
```

**3. Developer Response**
```
- Address critical issues immediately
- Discuss important feedback
- Consider suggestions
- Answer questions
- Push fixes
```

**4. Re-review** (if changes significant)
```
- Review only changed code
- Verify critical issues fixed
- Approve or request further changes
```

**5. Approval**
```
- All critical issues resolved
- Important feedback addressed or discussed
- Tests passing
- Ready to merge
```

---

## Security Incident Response

### Incident Severity Levels

**🔴 Critical**:
- Data breach or exposure
- Complete site compromise
- Unauthorized access to sensitive data
- Active exploitation

**🟡 High**:
- Vulnerability with high exploitation potential
- Security misconfiguration exposing system
- Outdated dependency with known exploit

**🟢 Medium**:
- Vulnerability requiring specific conditions
- Security best practice not followed
- Potential information disclosure

**🔵 Low**:
- Minor security improvement opportunity
- Hardening recommendation

---

### Incident Response Workflow

#### Phase 1: Detection & Assessment (T=0)

**1. Detect Incident**
```
Sources:
- Security scan alerts
- User reports
- Log anomalies
- Performance issues
- Automated monitoring
```

**2. Initial Assessment** (15 minutes)
```
□ Confirm incident is real (not false positive)
□ Determine severity level
□ Identify affected systems
□ Estimate scope of impact
□ Check if actively exploited
```

**3. Assemble Response Team**
```
Notify:
□ Technical lead
□ System administrator
□ Security specialist (if available)
□ Management (for critical/high)
```

---

#### Phase 2: Containment (T+30 minutes)

**For Critical Incidents**:
```bash
# 1. Immediate actions
# Take site offline (if necessary)
# Via cPanel: Redirect to maintenance page

# 2. Block attacker (if identified)
# Via cPanel: IP Blocker
# Add IP to .htaccess deny list

# 3. Disable compromised accounts
# Via Laravel:
php artisan user:disable <user-id>

# 4. Revoke API tokens
# Via database or Artisan command

# 5. Change sensitive credentials
# Database passwords
# API keys
# Session secrets
```

**For High Severity**:
```bash
# 1. Identify affected functionality
# 2. Disable vulnerable feature temporarily
# 3. Monitor for exploitation attempts
# 4. Prepare fix
```

---

#### Phase 3: Eradication (T+1 hour)

**1. Identify Root Cause**
```
□ What vulnerability was exploited?
□ How was system compromised?
□ What code has the issue?
□ When was vulnerability introduced?
```

**2. Develop Fix**
```bash
# Create emergency fix branch
git checkout -b hotfix/security-issue-XXX

# Implement fix
# - Patch vulnerability
# - Add input validation
# - Update dependencies
# - Remove backdoors (if any)

# Test fix thoroughly
php artisan test

# Security-specific tests
# - Try to exploit fixed vulnerability
# - Verify no bypass possible
# - Check for similar issues elsewhere
```

**3. Code Review**
```
□ Security-focused review
□ Verify fix is complete
□ Check for additional vulnerabilities
□ Ensure no new issues introduced
```

---

#### Phase 4: Recovery (T+2 hours)

**1. Deploy Fix**
```bash
# Deploy to production
git push origin main

# Monitor deployment
# Watch for errors

# Verify fix in production
# Attempt to exploit vulnerability
# Should now be blocked
```

**2. Restore Services**
```bash
# If site was offline:
# Remove maintenance mode

# Enable disabled features

# Restore from clean backup (if compromised)
```

**3. Verify System Integrity**
```bash
# Check file integrity
# Compare with known good version

# Check database for unauthorized changes
# Review recent database modifications

# Check for backdoors
grep -r "eval(" packages/ app/
grep -r "base64_decode" packages/ app/
grep -r "system(" packages/ app/

# Check logs for suspicious activity
grep "unauthorized" storage/logs/laravel.log
grep "failed login" storage/logs/laravel.log
```

---

#### Phase 5: Post-Incident (T+1 day)

**1. Incident Report**
```markdown
# Security Incident Report

## Incident Details
- **Date**: YYYY-MM-DD HH:MM
- **Severity**: Critical/High/Medium/Low
- **Status**: Resolved
- **Duration**: X hours

## Summary
[Brief description of incident]

## Timeline
- T=0: Incident detected
- T+15: Assessment complete, severity determined
- T+30: Containment actions taken
- T+1hr: Fix developed
- T+2hr: Fix deployed, services restored

## Root Cause
[Detailed explanation of vulnerability]

## Impact Assessment
- **Systems affected**: [List]
- **Data compromised**: [Yes/No, details]
- **User impact**: [Number of users, what they experienced]
- **Business impact**: [Downtime, data loss, reputation]

## Resolution
[What was done to fix the issue]

## Lessons Learned
[What went wrong, what went right]

## Preventive Measures
- [Action 1]
- [Action 2]
- [Action 3]

## Follow-up Actions
- [ ] Update security documentation
- [ ] Train team on prevention
- [ ] Implement monitoring
- [ ] Schedule security audit
```

**2. User Communication** (if data compromised)
```
□ Notify affected users
□ Explain what happened
□ What data was affected
□ What actions taken
□ What users should do
□ How to contact support
```

**3. Preventive Measures**
```
□ Add test to prevent regression
□ Update security checklist
□ Add monitoring/alerts
□ Review similar code for same issue
□ Security audit (comprehensive)
□ Update dependencies
□ Implement additional safeguards
```

---

## Performance Optimization Workflow

### Performance Issue Investigation

**1. Identify Performance Bottleneck**
```
Symptoms:
□ Slow page load times
□ High server CPU/memory usage
□ Slow database queries
□ Timeout errors
□ User complaints
```

**2. Measure Performance**
```bash
# Enable query logging (temporarily)
# config/database.php
'mysql' => [
    // ...
    'options' => [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET SQL_MODE="NO_ENGINE_SUBSTITUTION"',
    ],
    'dump' => [
        'log_queries' => true,
    ],
],

# Use Laravel Debugbar (local only)
composer require barryvdh/laravel-debugbar --dev

# Check slow query log (if enabled)
mysql -u username -p -e "SELECT * FROM mysql.slow_log LIMIT 10;"

# Profile with Laravel Telescope (if installed)
php artisan telescope:install
php artisan migrate
```

**3. Analyze Results**
```
Common bottlenecks:
□ N+1 query problems
□ Missing database indexes
□ Unoptimized queries
□ Large dataset loading (no pagination)
□ Uncompressed assets
□ No caching
□ Synchronous operations (should be queued)
□ Memory-intensive operations
```

---

### Optimization Techniques

**Database Optimization**

```php
// Problem: N+1 Queries
// Bad
$leads = Lead::all();
foreach ($leads as $lead) {
    echo $lead->user->name;  // Queries user for each lead
}

// Good: Eager Loading
$leads = Lead::with('user')->get();
foreach ($leads as $lead) {
    echo $lead->user->name;  // No additional queries
}

// Problem: Loading all records
// Bad
$leads = Lead::all();  // Loads ALL leads into memory

// Good: Pagination
$leads = Lead::paginate(20);

// Good: Chunking for large operations
Lead::chunk(100, function ($leads) {
    foreach ($leads as $lead) {
        // Process each lead
    }
});

// Problem: Counting related records
// Bad
$lead->products()->count();  // Additional query for each lead

// Good: Count eager loading
$leads = Lead::withCount('products')->get();
foreach ($leads as $lead) {
    echo $lead->products_count;  // No additional query
}
```

**Add Database Indexes**

```php
// Create migration for indexes
php artisan make:migration add_indexes_to_leads_table

// In migration
public function up(): void
{
    Schema::table('leads', function (Blueprint $table) {
        $table->index('status');  // If filtering by status frequently
        $table->index('created_at');  // If sorting by created_at
        $table->index(['user_id', 'status']);  // Composite index for common query
    });
}
```

**Query Optimization**

```php
// Use select() to load only needed columns
Lead::select('id', 'title', 'status')->get();

// Instead of
Lead::all();  // Loads all columns

// Use whereLazy for huge datasets
Lead::whereLazy('status', 'active')->each(function ($lead) {
    // Process each lead with minimal memory
});
```

**Caching**

```php
// Cache expensive queries
use Illuminate\Support\Facades\Cache;

// Cache for 1 hour
$leads = Cache::remember('active-leads', 3600, function () {
    return Lead::where('status', 'active')
               ->with('user', 'products')
               ->get();
});

// Clear cache when data changes
Cache::forget('active-leads');

// Or use cache tags (if supported)
Cache::tags(['leads'])->flush();
```

**Laravel Optimization Commands**

```bash
# Cache configuration (faster config loading)
php artisan config:cache

# Cache routes (faster route registration)
php artisan route:cache

# Cache views (faster view compilation)
php artisan view:cache

# Optimize autoloader
composer dump-autoload --optimize

# Optimize for production
composer install --no-dev --optimize-autoloader
php artisan optimize
```

---

## Conclusion

### Key Operational Principles

1. **Safety First**: Always prioritize production stability
2. **Test Thoroughly**: Test locally before deploying
3. **Backup Always**: Backup database before risky changes
4. **Monitor Actively**: Watch logs after deployments
5. **Document Everything**: Update docs, write clear commits
6. **Communicate Clearly**: Keep team informed of changes
7. **Rollback Ready**: Always have rollback plan
8. **Learn Continuously**: Document lessons learned

### Quick Reference Commands

```bash
# Testing
php artisan test
./vendor/bin/pint

# Deployment
git push origin main
php artisan migrate --force

# Monitoring
tail -f storage/logs/laravel.log
tail -f error_log

# Optimization
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Rollback
git revert HEAD
php artisan migrate:rollback --step=1

# Permissions
chmod -R 755 storage bootstrap/cache
chmod -R 775 storage/logs
```

---

**Document Version**: 1.0.0
**Last Updated**: 2025-12-31
**Maintained By**: Development Team
**Review Cycle**: Quarterly or after major process changes
