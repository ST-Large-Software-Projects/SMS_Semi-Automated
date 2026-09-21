# Refactor plan

This project is currently a legacy PHP application with a monolithic route file and repeated direct database configuration calls. The refactor should be done in phases so the existing screens keep working while the codebase becomes easier to maintain.

## Phase 1: foundation
- Centralize environment-based configuration and database creation.
- Replace the hardcoded `controller/config.php` pattern with a single app bootstrap.
- Clean up the front controller route map and validate requested files before loading them.

## Phase 2: service boundaries
- Move repeated SQL logic into reusable service or repository helpers.
- Replace duplicated database queries with shared query wrappers and validation helpers.
- Standardize request handling and session checks.

## Phase 3: presentation cleanup
- Separate business logic from presentation templates.
- Reduce inline JavaScript and repeated HTML scaffolding.
- Introduce shared view partials and consistent styling.

## Phase 4: quality and safety
- Add linting, automated checks, and basic request-level tests.
- Remove dead files, unused views, and outdated duplicated scripts.
- Document startup steps and configuration for local development.
