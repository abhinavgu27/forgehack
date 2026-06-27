# Sprint 1: Multi-Tenant Core Foundation

**Goal:** Build the database schema, authentication, and basic ticket management for a multi-tenant SaaS.

**Stack:** Laravel 11 + MySQL 8 + React 19 + Tailwind

**MUST tier (core):**
- Database schema (organizations, users, tickets, comments tables)
- Auth & roles (Laravel Sanctum: admin, agent, customer)
- Tickets CRUD (subject, description, status, priority, assignee, tags)
- Ticket conversation (threaded replies: public + internal notes)
- List + filters + search (by status, priority, assignee, text search)
- REST API + React frontend (documented JSON API)
- Seeded demo data (1 org, 1 admin, 2 agents, 2 customers, ~12 tickets)

---

## Issues

### Issue #1: Laravel Boot & Organization Tenant Layer
**Task:** Set up Laravel 11 with multi-tenancy. Create Organization model, migrate, and scope all queries by organization_id.

**Acceptance criteria:**
- Laravel 11 scaffolded in backend/
- Organization model + migration
- Sanctum auth ready
- All queries scoped by organization_id

**Estimate:** 15-20 min

**Assigned:** @OpenClaw

**Status:** In Progress

---

### Issue #2: User Model & Role System
**Task:** Extend User model with roles (admin, agent, customer) and relationship to Organization.

**Acceptance criteria:**
- Users migration with organization_id, role enum
- User model with role() accessor and organization() relationship
- Role middleware for admin/agent/customer routes

**Estimate:** 15-20 min

**Assigned:** TBD

**Status:** Pending

---

### Issue #3: Tickets Schema & Model
**Task:** Create tickets table with multi-tenant scoping and relationships.

**Acceptance criteria:**
- Tickets migration (subject, description, status, priority, assignee_id, organization_id)
- Ticket model with relationships to Organization, User (assignee)
- Status enum: open, in_progress, resolved, closed
- Priority enum: low, medium, high, urgent

**Estimate:** 15-20 min

**Assigned:** TBD

**Status:** Pending

---

### Issue #4: Comments/Threaded Replies System
**Task:** Build comments system for ticket conversations (public + internal notes).

**Acceptance criteria:**
- Comments migration (ticket_id, user_id, body, is_internal)
- Comment model with relationships
- Internal comments hidden from customers

**Estimate:** 15-20 min

**Assigned:** TBD

**Status:** Pending

---

### Issue #5: Sanctum Auth API Endpoints
**Task:** Build auth endpoints: register, login, logout with organization context.

**Acceptance criteria:**
- AuthController with register, login, logout methods
- Token management via Sanctum
- Validation rules for registration
- Return user with organization context

**Estimate:** 15-20 min

**Assigned:** TBD

**Status:** Pending

---

### Issue #6: Ticket CRUD API
**Task:** Build REST API for tickets (index, store, show, update, delete).

**Acceptance criteria:**
- TicketController with full CRUD
- Multi-tenant scoping (org users see only org tickets)
- Validation rules for ticket fields
- Include assignee and comments in responses

**Estimate:** 20 min

**Assigned:** TBD

**Status:** Pending

---

### Issue #7: API Filters, Search & Pagination
**Task:** Add filtering, search, and pagination to ticket listings.

**Acceptance criteria:**
- Filter by status, priority, assignee_id
- Text search on subject and description
- Pagination (15 tickets per page)
- Organize queries for performance

**Estimate:** 15-20 min

**Assigned:** TBD

**Status:** Pending

---

### Issue #8: Demo Data Seeder
**Task:** Create comprehensive seeder with realistic data.

**Acceptance criteria:**
- 1 organization
- 1 admin, 2 agents, 2 customers
- ~12 tickets across different statuses/priorities
- Comments on tickets
- Internal notes visible only to agents/admins

**Estimate:** 15-20 min

**Assigned:** TBD

**Status:** Pending

---

## Progress

- **Completed:** 0/8
- **In Progress:** 1/8
- **Pending:** 7/8