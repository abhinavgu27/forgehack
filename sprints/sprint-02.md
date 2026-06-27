# Sprint 2: Enhanced Features & Polish

**Goal:** Build on Sprint 1 foundation with assignment workflows, SLAs, and dashboard.

**Stack:** Laravel 11 + MySQL 8 + React 19 + Tailwind

**SHOULD tier (if time permits):**
- Ticket assignment: Assign tickets to agents, track assignee
- SLA management: Set response/resolution time targets per priority
- Queue system: Organize tickets by status/priority queues
- Dashboard: Agent workload view, ticket metrics, SLA compliance
- Bulk actions: Mark multiple tickets as resolved, reassign batch
- Activity log: Track ticket changes (created, assigned, status changed)
- Email notifications: Notify on ticket creation, assignment, status change (optional)

---

## Issues

### Issue #1: Ticket Assignment Workflow
**Task:** Build ticket assignment functionality with agent selection and tracking.

**Acceptance criteria:**
- Assign tickets to agents via API
- Track assignee changes in activity log
- Agent can view their assigned tickets filter
- Reassignment API endpoint
- Real-time assignment notifications

**Estimate:** 10-15 min

**Assigned:** @OpenClaw

**Status:** In Progress

---

### Issue #2: SLA Management System
**Task:** Implement SLA tracking based on ticket priority.

**Acceptance criteria:**
- SLA configuration per priority (response time, resolution time)
- SLA status calculation (within SLA, at risk, breached)
- SLA indicators in ticket listings
- SLA violations flagged in dashboard

**Estimate:** 15 min

**Assigned:** TBD

**Status:** Pending

---

### Issue #3: Ticket Queue System
**Task:** Create queue views for organizing tickets by status and priority.

**Acceptance criteria:**
- Queue API endpoints (by status, by priority, by assignee)
- React queue view components
- Drag-and-drop ticket status changes
- Queue badges showing ticket counts

**Estimate:** 15 min

**Assigned:** TBD

**Status:** Pending

---

### Issue #4: Agent Dashboard
**Task:** Build dashboard with workload metrics and SLA compliance.

**Acceptance criteria:**
- Dashboard API with aggregated stats
- Agent workload view (assigned, open, resolved)
- Ticket metrics by status, priority
- SLA compliance indicators
- React dashboard components

**Estimate:** 15 min

**Assigned:** TBD

**Status:** Pending

---

### Issue #5: Activity Log System
**Task:** Track and display ticket activity history.

**Acceptance criteria:**
- Activity log model/migration (ticket_id, user_id, action, changes)
- Automatic activity logging on ticket changes
- Activity API endpoint per ticket
- Activity timeline UI component

**Estimate:** 10-15 min

**Assigned:** TBD

**Status:** Pending

---

### Issue #6: Bulk Actions API
**Task:** Enable bulk ticket operations.

**Acceptance criteria:**
- Bulk update API endpoint
- Bulk status change (resolve, close)
- Bulk reassign to agent
- Bulk tagging
- React bulk action UI with checkboxes

**Estimate:** 15 min

**Assigned:** TBD

**Status:** Pending

---

## Progress

- **Completed:** 0/6
- **In Progress:** 1/6
- **Pending:** 5/6