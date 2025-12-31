# AI Prompts Library - Krayin CRM

## Overview

This document contains ready-to-use AI prompts for common tasks in the Krayin CRM Laravel project deployed on cPanel Smarthost. Copy and paste these prompts, then customize the placeholders `[like this]` with your specific requirements.

---

## Table of Contents

1. [Development Prompts](#development-prompts)
2. [Debugging Prompts](#debugging-prompts)
3. [Testing Prompts](#testing-prompts)
4. [Deployment Prompts](#deployment-prompts)
5. [Code Review Prompts](#code-review-prompts)
6. [Documentation Prompts](#documentation-prompts)
7. [Database Prompts](#database-prompts)
8. [Frontend Prompts](#frontend-prompts)
9. [Security Audit Prompts](#security-audit-prompts)
10. [Performance Optimization Prompts](#performance-optimization-prompts)

---

## Development Prompts

### Add New Feature to Existing Package

```
I need to add a new feature to the Krayin CRM [Package Name] package.

Feature: [Brief description of the feature]

Requirements:
- [Requirement 1]
- [Requirement 2]
- [Requirement 3]

Please:
1. Read the existing [Package Name] package structure in packages/Webkul/[PackageName]/
2. Create necessary database migration(s)
3. Update the Model with new fields and relationships
4. Add controller methods with proper validation
5. Create/update Blade views using Krayin UI components
6. Write PHPUnit tests for the new feature
7. Follow Krayin's repository pattern and conventions

Don't deploy yet - I'll test locally first.
```

**Example**:
```
I need to add a new feature to the Krayin CRM Lead package.

Feature: Add "Follow-up Date" field to leads with automatic reminder notifications

Requirements:
- DateTime field for follow-up date
- Automatic notification 1 day before follow-up
- Display in lead list and detail views
- Filter leads by upcoming follow-ups

Please:
1. Read the existing Lead package structure in packages/Webkul/Lead/
2. Create necessary database migration(s)
3. Update the Model with new fields and relationships
4. Add controller methods with proper validation
5. Create/update Blade views using Krayin UI components
6. Write PHPUnit tests for the new feature
7. Follow Krayin's repository pattern and conventions

Don't deploy yet - I'll test locally first.
```

---

### Create New Krayin Package

```
I need to create a new Krayin CRM package for [Feature Name].

Package Name: [PackageName]
Purpose: [Description of what this package does]

Features needed:
- [Feature 1]
- [Feature 2]
- [Feature 3]

Database tables:
- [table_name_1]: [description]
- [table_name_2]: [description]

Please:
1. Create complete package directory structure following Krayin conventions
2. Generate composer.json for the package
3. Create ServiceProvider with proper registrations
4. Generate migrations for all database tables
5. Create Models with relationships
6. Create Repository classes
7. Create Controllers with CRUD operations
8. Create Blade views using Krayin UI components
9. Add routes (web.php and api.php if needed)
10. Add to config/concord.php
11. Update root composer.json autoload
12. Create basic PHPUnit tests

Follow the structure used in packages/Webkul/Lead/ as reference.
```

---

### Modify Existing Controller

```
I need to modify the [PackageName] controller at:
packages/Webkul/[PackageName]/src/Http/Controllers/[ControllerName].php

Changes needed:
- [Change 1]
- [Change 2]
- [Change 3]

Please:
1. Read the current controller implementation
2. Implement the requested changes
3. Maintain existing functionality
4. Add proper validation rules
5. Use dependency injection
6. Follow PSR-12 coding standards
7. Add PHPDoc comments
8. Update or create tests for modified methods

Show me the changes before implementing.
```

---

### Add API Endpoint

```
I need to add a new API endpoint to the Krayin CRM.

Endpoint: [POST/GET/PUT/DELETE] /api/[endpoint-path]
Purpose: [Description]

Request parameters:
- [param1]: [type] - [description]
- [param2]: [type] - [description]

Response format:
{
    "success": true,
    "data": { ... },
    "message": "..."
}

Please:
1. Create API controller in packages/Webkul/[Package]/src/Http/Controllers/Api/
2. Add route to packages/Webkul/[Package]/src/Routes/api.php
3. Implement proper validation using Form Request
4. Add authentication middleware (sanctum or passport)
5. Return JSON responses with proper HTTP status codes
6. Write API tests in tests/Feature/Api/
7. Follow RESTful conventions
8. Add rate limiting if needed

Document the API endpoint format.
```

---

### Update Database Schema

```
I need to modify the database schema for [table_name].

Changes:
- [Add/Modify/Remove] column: [column_name] [type] [constraints]
- [Add index on: column_name]
- [Add foreign key: references table_name(id)]

Please:
1. Create a new migration file (don't modify existing migrations)
2. Include both up() and down() methods
3. Handle existing data appropriately (if modifying)
4. Update the corresponding Model's $fillable array
5. Update any affected relationships
6. Update Form Requests validation rules
7. Update views if needed
8. Write tests for the schema change

IMPORTANT: Don't run the migration automatically. I'll review and run it manually on production.
```

---

## Debugging Prompts

### Debug Production Error

```
I'm experiencing an error in production on crm.pbmediaonline.pl

Error: [Copy exact error message or description]
URL: [URL where error occurs]
Steps to reproduce:
1. [Step 1]
2. [Step 2]
3. [Error occurs]

Please:
1. Analyze the error based on Laravel error patterns
2. Check likely locations in Krayin CRM codebase
3. Identify potential root causes
4. Suggest where to look in logs:
   - storage/logs/laravel.log
   - error_log (cPanel)
5. Propose fixes with explanation
6. Suggest prevention strategies

Don't make any changes yet - let's diagnose first.
```

---

### Analyze Laravel Logs

```
I'm seeing errors in production logs. Here's the log content:

[Paste log entries here]

Please:
1. Parse and analyze these log entries
2. Identify the root cause(s)
3. Determine severity (critical, warning, info)
4. Group related errors
5. Suggest fixes for each issue
6. Indicate which files need changes
7. Estimate impact on users

Prioritize critical errors first.
```

---

### Performance Issue Investigation

```
I'm experiencing slow performance on [specific page/feature].

Details:
- Page/Feature: [URL or description]
- Load time: [approximate seconds]
- Environment: Production (cPanel shared hosting)

Please:
1. Identify likely bottlenecks for this feature
2. Check for N+1 query issues in controllers/repositories
3. Suggest database indexes that might help
4. Recommend caching strategies
5. Check for missing eager loading
6. Suggest optimization techniques compatible with shared hosting

Show me specific code locations to investigate.
```

---

### Database Query Optimization

```
I need to optimize this query that's running slowly:

[Paste query or describe the operation]

Context:
- Table size: [approximate row count]
- Frequency: [how often this query runs]
- Current execution time: [seconds]

Please:
1. Analyze the query structure
2. Suggest indexes to create
3. Rewrite using Eloquent if it's raw SQL
4. Add eager loading if N+1 issue
5. Suggest caching strategy if appropriate
6. Show migration to add indexes
7. Explain expected performance improvement

Keep in mind cPanel shared hosting constraints.
```

---

## Testing Prompts

### Write Unit Tests

```
I need unit tests for [Class/Method Name].

File: [path to file]
Method: [method name]

Please:
1. Read the implementation
2. Write comprehensive unit tests covering:
   - Happy path scenarios
   - Edge cases
   - Error conditions
   - Input validation
3. Use PHPUnit and Laravel testing utilities
4. Mock dependencies appropriately
5. Follow AAA pattern (Arrange, Act, Assert)
6. Aim for 100% code coverage of this method
7. Use meaningful test method names

Place tests in: tests/Unit/[appropriate path]/
```

---

### Write Feature Tests

```
I need feature tests for [Feature Name].

Feature: [description]
Endpoints involved:
- [POST/GET/PUT/DELETE] [/route/path]

Please:
1. Write HTTP feature tests covering:
   - Successful requests (200, 201)
   - Validation errors (422)
   - Authorization checks (403)
   - Not found errors (404)
   - Database state changes
2. Use Laravel's HTTP testing utilities
3. Use factories for test data
4. Test JSON responses if API
5. Test redirects if web routes
6. Test database transactions

Place tests in: tests/Feature/[appropriate path]/
```

---

### Create Test Database Factory

```
I need a database factory for [Model Name].

Model: [path to model]

Please:
1. Read the model definition
2. Create factory in database/factories/
3. Include all fillable fields
4. Use appropriate Faker methods for realistic data
5. Handle relationships (if any)
6. Add states for common scenarios
7. Ensure foreign keys are valid

Show example usage of the factory.
```

---

### Run Full Test Suite with Analysis

```
Please help me analyze the test suite results.

[Paste test output or describe test failures]

For each failure:
1. Identify the root cause
2. Determine if it's a test issue or code issue
3. Suggest fix
4. Check for related failures (same root cause)

Also:
- Suggest improvements to test coverage
- Identify missing test cases
- Recommend refactoring if tests are brittle
```

---

## Deployment Prompts

### Review Pre-Deployment

```
I'm about to deploy changes to production (crm.pbmediaonline.pl).

Changes in this deployment:
- [List of features/fixes]

Files modified:
- [List key files or reference commit hash: abc123]

Please review:
1. Check if any database migrations are included
2. Verify .env.example is updated (if needed)
3. Confirm no secrets are committed
4. Check if composer.json dependencies changed
5. Verify frontend assets are built (public/build/)
6. Review .cpanel.yml for any needed changes
7. Identify any breaking changes
8. Suggest deployment steps
9. Create rollback plan

Provide deployment checklist.
```

---

### Update .cpanel.yml

```
I need to update the .cpanel.yml deployment configuration.

Current needs:
- [Need 1: e.g., add npm build step]
- [Need 2: e.g., change PHP version]
- [Need 3: e.g., add permission fix]

Please:
1. Read current .cpanel.yml
2. Propose updated configuration
3. Explain each change
4. Ensure compatibility with cPanel Smarthost
5. Include error handling where possible
6. Test commands for syntax errors
7. Document any manual steps still needed

Remember: migrations should NOT be automated.
```

---

### Deployment Rollback Plan

```
Create a rollback plan for deployment [date/version].

Deployment includes:
- Database migrations: [Yes/No]
- New dependencies: [Yes/No]
- Config changes: [Yes/No]

Please provide:
1. Step-by-step rollback procedure
2. Git commands to revert
3. Database rollback (if migrations ran)
4. File restoration steps
5. Cache clearing commands
6. Verification steps
7. Estimated rollback time

Include both automatic and manual rollback options.
```

---

### Post-Deployment Verification

```
I just deployed to production. Help me verify everything is working.

Deployment: [brief description]
Time: [timestamp]

Please create a verification checklist:
1. URLs to test manually
2. Log files to check and what to look for
3. Database queries to verify data integrity
4. File permissions to check
5. Cache status verification
6. Critical features to test
7. Performance checks
8. Monitoring to set up

Provide commands to run for verification.
```

---

## Code Review Prompts

### Review Pull Request

```
Please review this code change:

[Paste code diff or describe changes]

Review for:
1. **Functionality**: Does it meet requirements?
2. **Security**: Any vulnerabilities?
3. **Performance**: Any inefficiencies?
4. **Laravel best practices**: Following conventions?
5. **Krayin patterns**: Consistent with codebase?
6. **Testing**: Adequate test coverage?
7. **Documentation**: Clear comments?
8. **Error handling**: Proper try-catch and validation?
9. **cPanel compatibility**: Works in shared hosting?
10. **Database**: Proper migrations, no N+1 issues?

Rate: Critical Issues | Suggestions | Compliments
```

---

### Security Audit

```
Please audit this code for security vulnerabilities:

[Paste code or file path]

Check for:
1. SQL injection (raw queries)
2. XSS vulnerabilities (unescaped output)
3. CSRF protection (forms without @csrf)
4. Mass assignment vulnerabilities ($fillable/$guarded)
5. Insecure file uploads
6. Missing authorization checks
7. Exposed sensitive data
8. Weak cryptography
9. Hardcoded secrets
10. OWASP Top 10 issues

Provide severity rating and fixes for each issue found.
```

---

### Code Quality Check

```
Analyze code quality for:
[File path or paste code]

Check:
1. PSR-12 compliance
2. SOLID principles
3. DRY violations
4. Complexity (cyclomatic complexity)
5. Method length
6. Class responsibilities
7. Naming conventions
8. Type hints and return types
9. PHPDoc comments
10. Code smells

Suggest refactoring opportunities with examples.
```

---

## Documentation Prompts

### Generate API Documentation

```
Generate API documentation for [Package/Feature Name].

Endpoints in: packages/Webkul/[Package]/src/Routes/api.php

For each endpoint, document:
1. HTTP method and path
2. Description and purpose
3. Authentication requirements
4. Request parameters (type, required/optional, description)
5. Request example (JSON)
6. Response format
7. Response example (success and error)
8. HTTP status codes
9. Rate limiting (if any)
10. Example curl command

Format in Markdown suitable for API_DOCUMENTATION.md.
```

---

### Update README

```
Update the README.md with recent changes.

Recent changes:
- [Change 1]
- [Change 2]
- [Change 3]

Please:
1. Read current README.md
2. Update relevant sections
3. Maintain existing structure and tone
4. Add new sections if needed
5. Update installation instructions if needed
6. Update screenshots/examples if outdated
7. Keep it concise but comprehensive
8. Add table of contents if missing

Show me the proposed changes first.
```

---

### Generate Code Documentation

```
Add comprehensive PHPDoc comments to:
[File path or class name]

Please:
1. Read the code
2. Add class-level PHPDoc with description and @package
3. Add method-level PHPDoc with:
   - Description
   - @param tags with types and descriptions
   - @return tag with type and description
   - @throws tags for exceptions
4. Add property PHPDoc with @var tags
5. Follow PHPDoc standards
6. Be descriptive but concise

Don't change functionality, only add documentation.
```

---

### Create Troubleshooting Guide

```
Create a troubleshooting entry for this common issue:

Issue: [Description]
Symptoms: [What users see]
Environment: Production cPanel

Include:
1. Issue title and symptoms
2. Diagnostic steps
3. Common causes
4. Solution (step-by-step)
5. Prevention tips
6. Related issues

Format for TROUBLESHOOTING.md in existing style.
```

---

## Database Prompts

### Design Database Schema

```
I need to design database schema for [Feature Name].

Requirements:
- [Requirement 1]
- [Requirement 2]
- [Requirement 3]

Please:
1. Propose table structure(s)
2. Define columns with types and constraints
3. Establish relationships and foreign keys
4. Suggest indexes for performance
5. Consider data integrity (cascades, defaults)
6. Create migration(s)
7. Create Eloquent model(s) with relationships
8. Explain design decisions

Follow Krayin CRM naming conventions.
```

---

### Generate Database Seeder

```
Create a database seeder for [Table/Feature Name].

Purpose: [Why we need seed data]

Please:
1. Create seeder class in packages/Webkul/[Package]/src/Database/Seeders/
2. Generate realistic sample data
3. Use factories where available
4. Handle foreign key constraints
5. Include variety (different statuses, types, etc.)
6. Make it idempotent (can run multiple times safely)
7. Document what data is seeded

Seed approximately [N] records.
```

---

### Optimize Database Indexes

```
Analyze and optimize database indexes for [Table Name].

Table: [table_name]
Size: [approximate row count]

Common queries:
- [Query pattern 1]
- [Query pattern 2]

Please:
1. Analyze current indexes
2. Suggest new indexes based on query patterns
3. Identify unused or redundant indexes
4. Create migration to add/remove indexes
5. Estimate performance impact
6. Consider composite indexes where beneficial
7. Explain index choices

Show migration code.
```

---

### Create Database Backup Script

```
Create a database backup script for production.

Requirements:
- Backup MySQL database via cPanel
- Compress the backup
- Include timestamp in filename
- Keep last [N] backups
- Can run manually or via cron

Please:
1. Create bash script in scripts/backup-database.sh
2. Use cPanel-compatible commands
3. Add error handling
4. Add logging
5. Make it executable
6. Document usage
7. Suggest cron schedule

Include instructions for setup in cPanel.
```

---

## Frontend Prompts

### Create Vue.js Component

```
Create a Vue.js 3 component for [Component Purpose].

Component: [ComponentName]

Requirements:
- [Requirement 1]
- [Requirement 2]
- [Requirement 3]

Please:
1. Use <script setup> with TypeScript
2. Define props and emits with types
3. Use Composition API
4. Include template with proper structure
5. Add scoped styles
6. Handle loading and error states
7. Add JSDoc comments
8. Follow Vue 3 best practices
9. Integrate with Krayin design system (if applicable)

Place in: resources/js/components/[appropriate path]/
```

---

### Fix Frontend Build Error

```
I'm getting a frontend build error:

[Paste error message]

Please:
1. Analyze the error
2. Identify the root cause
3. Check common issues:
   - Missing dependencies
   - Import path errors
   - TypeScript type errors
   - Vite configuration issues
4. Suggest fix
5. Provide commands to resolve

Don't rebuild yet - let's diagnose first.
```

---

### Optimize Frontend Performance

```
Optimize frontend performance for [Page/Component].

Current issues:
- [Issue 1: e.g., slow initial load]
- [Issue 2: e.g., large bundle size]

Please:
1. Analyze current implementation
2. Suggest optimizations:
   - Code splitting
   - Lazy loading
   - Tree shaking
   - Asset optimization
   - Caching strategies
3. Implement changes
4. Measure improvement
5. Ensure compatibility with Vite

Show before/after bundle sizes if possible.
```

---

## Security Audit Prompts

### Comprehensive Security Audit

```
Perform a comprehensive security audit of the Krayin CRM codebase.

Focus areas:
1. Authentication and authorization
2. Input validation and sanitization
3. Database query security (SQL injection)
4. XSS vulnerabilities
5. CSRF protection
6. File upload security
7. Session management
8. Dependency vulnerabilities
9. Environment configuration
10. cPanel-specific security

For each issue found:
- Severity (Critical/High/Medium/Low)
- Location in code
- Vulnerability description
- Exploitation scenario
- Recommended fix
- Prevention strategy

Prioritize critical and high-severity issues.
```

---

### Audit Dependencies

```
Audit Composer and NPM dependencies for vulnerabilities.

Please:
1. Run composer audit (simulated)
2. Check for known vulnerabilities
3. Identify outdated packages with security issues
4. Suggest updates
5. Check for abandoned packages
6. Review license compliance
7. Provide upgrade path with testing recommendations

Generate report in Markdown format.
```

---

### Review Authentication System

```
Review the authentication system for security.

Check:
1. Password hashing (bcrypt/argon2)
2. Session configuration
3. Cookie security (httpOnly, secure, sameSite)
4. Remember me functionality
5. Password reset flow
6. Rate limiting on login
7. Account lockout after failed attempts
8. Two-factor authentication (if implemented)
9. API authentication (Sanctum/Passport)
10. Authorization policies and gates

Identify vulnerabilities and suggest improvements.
```

---

## Performance Optimization Prompts

### Optimize Laravel Application

```
Optimize the Laravel application for cPanel production environment.

Current issues:
- [Issue 1]
- [Issue 2]

Please:
1. Analyze configuration files (config/)
2. Check caching strategies:
   - Config cache
   - Route cache
   - View cache
   - Query caching
3. Review eager loading in controllers/repositories
4. Check for N+1 queries
5. Suggest database indexes
6. Optimize autoloader
7. Review session/cache drivers
8. Check for unused services
9. Suggest OPcache settings for .user.ini

Provide commands and configuration changes.
```

---

### Database Query Performance

```
Optimize database performance for the application.

Please:
1. Identify slow queries (if query log available)
2. Suggest indexes for common queries
3. Check for N+1 query problems
4. Review eager loading usage
5. Suggest query result caching
6. Check for redundant queries
7. Optimize heavy queries
8. Suggest database configuration for cPanel

Provide migrations for index changes.
```

---

### Reduce Page Load Time

```
Reduce page load time for [specific page/URL].

Current load time: [seconds]
Target: [seconds]

Please:
1. Analyze potential bottlenecks:
   - Database queries
   - Asset loading
   - Server processing
2. Suggest optimizations:
   - Query optimization
   - Asset compression
   - Lazy loading
   - Caching
3. Implement changes
4. Measure improvement
5. Consider cPanel shared hosting constraints

Provide before/after analysis.
```

---

## Usage Tips

### How to Use These Prompts

1. **Copy the relevant prompt** from above
2. **Customize placeholders** in [brackets] with your specific details
3. **Add context** if needed (paste code, error messages, logs)
4. **Paste to AI assistant** (Claude, GPT, etc.)
5. **Review suggestions** before implementing
6. **Test locally first** before deploying to production

### Best Practices

- ✅ Be specific: More details = better responses
- ✅ Provide context: Share relevant code, errors, logs
- ✅ Ask for explanations: Understand the why, not just the how
- ✅ Request review before changes: "Show me first" or "Don't implement yet"
- ✅ Include constraints: Mention cPanel, shared hosting, production
- ✅ Follow up: Ask clarifying questions if needed

### Safety Reminders

- ⚠️ Always review AI-generated code before using
- ⚠️ Test locally before deploying to production
- ⚠️ Backup database before schema changes
- ⚠️ Never commit secrets or credentials
- ⚠️ Monitor logs after deployment
- ⚠️ Have rollback plan ready

---

## Contributing New Prompts

Found a useful prompt? Add it to this document:

1. Choose appropriate category
2. Use the template format
3. Include clear placeholders
4. Add example if helpful
5. Test the prompt before adding
6. Keep it generic enough to reuse

---

**Document Version**: 1.0.0
**Last Updated**: 2025-12-31
**Maintained By**: Development Team
**Review Cycle**: Monthly or as needed
