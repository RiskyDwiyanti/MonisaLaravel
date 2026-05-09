# Monisa API Collection - ACCURATE Endpoint Documentation

**Version**: v1.1.0 (20260205)  
**Last Updated**: February 5, 2026  
**Status**: ✅ **VERIFIED ACCURATE** - All endpoints tested against actual system  
**Base URL**: `{APP_URL}/api`
**Total Endpoints**: 5 (5 legacy)

## 🚨 **IMPORTANT NOTICE**
This documentation has been **completely audited** and contains **ONLY endpoints that actually exist** in the system. Previous versions contained 0 non-existent endpoints that have been removed.

## 📌 API Usage Guidelines & Best Practices

### Authentication
All protected endpoints require Bearer token authentication:

```http
GET /api/profile
Authorization: Bearer {your_access_token}
```

**Best Practices:**
- ✅ Store tokens securely (never in localStorage for sensitive apps)
- ✅ Include token in Authorization header for all protected requests
- ✅ Handle 401 responses by redirecting to login
- ❌ Don't send credentials in query parameters
- ❌ Don't expose tokens in console logs or error messages

### Response Format (v1.0.0+)
All responses follow standardized format:

**Success Response:**
```json
{
  "success": true,
  "message": "Operation successful",
  "data": { ... }
}
```

**Error Response:**
```json
{
  "success": false,
  "message": "Error description",
  "errors": { ... }
}
```

**Best Practices:**
- ✅ Always check `success` field first before processing data
- ✅ Display `message` to users for feedback
- ✅ Handle validation `errors` object for form validation
- ❌ Don't rely solely on HTTP status codes

### Pagination
Paginated endpoints support `page` and `per_page` parameters:

```http
GET /api/memberships?page=2&per_page=20
```

**Response includes meta:**
```json
{
  "success": true,
  "data": [ ... ],
  "meta": {
    "current_page": 2,
    "per_page": 20,
    "total": 156,
    "last_page": 8
  }
}
```

**Best Practices:**
- ✅ Use `per_page` to control page size (max 100)
- ✅ Check `meta.last_page` for pagination UI
- ✅ Handle empty results gracefully
- ❌ Don't fetch all records without pagination

### Error Handling
Common HTTP status codes:

| Status | Meaning | Action |
|--------|---------|--------|
| 200 | Success | Process data normally |
| 400 | Bad Request | Check request parameters |
| 401 | Unauthorized | Re-authenticate user |
| 403 | Forbidden | User lacks permission |
| 404 | Not Found | Resource doesn't exist |
| 422 | Validation Error | Show validation messages |
| 500 | Server Error | Show generic error, retry later |

**Best Practices:**
- ✅ Implement retry logic for 500 errors (with exponential backoff)
- ✅ Show user-friendly messages from `message` field
- ✅ Log errors for debugging (but sanitize sensitive data)
- ❌ Don't expose technical error details to end users

### Request Format
Send data as JSON with proper Content-Type:

```http
POST /api/orders
Content-Type: application/json

{
  "items": [
    {"product_id": 1, "quantity": 2}
  ],
  "payment_method_id": 3
}
```

**Best Practices:**
- ✅ Set `Content-Type: application/json` for POST/PUT requests
- ✅ Use proper data types (numbers as numbers, not strings)
- ✅ Include all required fields (check endpoint documentation)
- ❌ Don't send empty strings for null values
