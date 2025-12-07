#!/bin/bash

# AutoParts Pro - Development Server Startup Script
# This script starts the PHP built-in web server

echo "🚀 Starting AutoParts Pro development server..."
echo ""
echo "📍 Server will be available at: http://localhost:8000"
echo "📁 Document root: $(pwd)"
echo ""
echo "Press Ctrl+C to stop the server"
echo "----------------------------------------"
echo ""

# Check if PHP is installed
if ! command -v php &> /dev/null; then
    echo "❌ Error: PHP is not installed or not in PATH"
    echo "Please install PHP to continue"
    exit 1
fi

# Start PHP server
php -S localhost:8000

